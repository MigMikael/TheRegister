<?php

namespace App\Http\Controllers;

use App\Helper\TokenGenerator;
use App\ItemOrder;
use App\Participant;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Anouar\Fpdf\Fpdf;
use Log;

class ParticipantController extends Controller
{
    public function welcome()
    {
        return view('participant.welcome');
    }
    
    public function checkOrderId(Request $request)
    {
        $order_id_1 = $request->get('order_id_1');
        $order_id_2 = $request->get('order_id_2');
        $order_id_3 = $request->get('order_id_3');
        $order_id_4 = $request->get('order_id_4');

        $order_id = (int)($order_id_1.$order_id_2.$order_id_3.$order_id_4);

        if($order_id > 0 && $order_id <= 600){
            $num = Participant::where('order_id', '=', $order_id)->count();

            if($num == 0){
                // already register 0 person >> step 1
                $generator = new TokenGenerator();
                $couple_token = $generator->generate(10);
                return redirect()->action('ParticipantController@step1', [
                    'order_id' => $order_id,
                    'couple_token' => $couple_token,
                ]);
            }
            elseif($num == 1){
                // already register 1 person >> step 2
                $participant = Participant::where('order_id', '=', $order_id)->first();
                return redirect()->action('ParticipantController@step2', [
                    'order_id' => $order_id,
                    'couple_token' => $participant->couple_token,
                ]);
            }
            else{
                // already register 2 person >> finish
                $participant = Participant::where('order_id', '=', $order_id)->first();
                return redirect()->action('ParticipantController@finish', [
                    'order_id' => $order_id,
                    'couple_token' => $participant->couple_token,
                ]);
            }
        }else{
            // wrong order_id
            //return response()->json(['msg' => 'Sorry, This OrderID is invalid or already register!']);
            return redirect()->action('ParticipantController@handleError', ['error_msg' => 'user_not_found']);
        }
    }

    public function step1($order_id, $couple_token)
    {
        $amount = Participant::where('couple_token', '=', $couple_token)->count();
        if($amount >= 1){
            return redirect()->action('ParticipantController@handleError', ['error_msg' => 'already_register']);
        }

        $category = [
            'teacher' => 'อาจารย์',
            'staff' => 'เจ้าหน้าที่',
            'alumni' => 'ศิษย์เก่า',
            'student' => 'นักศึกษา',
            'person' => 'บุคคลทั่วไป'
        ];
        return view('participant.create', [
            'url' => 'store_step_1',
            'category' => $category,
            'order_id' => $order_id,
            'couple_token' => $couple_token
        ]);
    }

    public function step2($order_id, $couple_token)
    {
        $amount = Participant::where('couple_token', '=', $couple_token)->count();
        if($amount >= 2){
            return redirect()->action('ParticipantController@handleError', ['error_msg' => 'already_register']);
        }

        $category = [
            'teacher' => 'อาจารย์',
            'staff' => 'เจ้าหน้าที่',
            'alumni' => 'ศิษย์เก่า',
            'student' => 'นักศึกษา',
            'person' => 'บุคคลทั่วไป'
        ];
        return view('participant.create', [
            'url' => 'store_step_2',
            'category' => $category,
            'order_id' => $order_id,
            'couple_token' => $couple_token
        ]);
    }

    public function finish($order_id, $couple_token)
    {
        $participants = Participant::where('order_id', '=', $order_id)->get();

        if(sizeof($participants) > 0){
            $participants = self::translateCategory($participants);
            $participants = self::changeOrderID($participants);
            return view('participant.show', [
                'participants' => $participants,
                'couple_token' => $couple_token
            ]);
        }
        else {
            return redirect()->action('ParticipantController@handleError', ['error_msg' => 'user_not_found']);
        }
    }

    public function storeStep1(Request $request)
    {
        $participant = $request->all();

        $token = (new TokenGenerator())->generate(10);
        $participant['token'] = $token;

        $participant = Participant::create($participant);

        return redirect()->action('ParticipantController@step2', [
            'order_id' => $participant->order_id,
            'couple_token' => $participant->couple_token
        ]);
    }

    public function storeStep2(Request $request)
    {
        $participant = $request->all();

        $token = (new TokenGenerator())->generate(10);
        $participant['token'] = $token;

        $participant = Participant::create($participant);

        return redirect()->action('ParticipantController@finish', [
            'order_id' => $participant->order_id,
            'couple_token' => $participant->couple_token
        ]);
    }

    public function edit($token)
    {
        $category = [
            'teacher' => 'อาจารย์',
            'staff' => 'เจ้าหน้าที่',
            'alumni' => 'ศิษย์เก่า',
            'student' => 'นักศึกษา',
            'person' => 'บุคคลทั่วไป'
        ];
        $participant = Participant::where('token', '=', $token)->first();

        return view('participant.edit', [
            'url' => 'participant/'.$participant->id,
            'category' => $category,
            'order_id' => $participant->order_id,
            'couple_token' => $participant->couple_token,
            'participant' => $participant
        ]);
    }

    public function update(Request $request, $id)
    {
        $editParticipant = $request->all();
        $participant = Participant::findOrFail($id);
        $participant->update($editParticipant);

        return redirect()->action('ParticipantController@finish', [
            'order_id' => $participant->order_id,
            'couple_token' => $participant->couple_token
        ]);
    }

    #-------------------------------------------------------------------------------------------------------------------

    public function registerWithOrderID(Request $request)
    {
        $order_id_1 = $request->get('order_id_1');
        $order_id_2 = $request->get('order_id_2');
        $order_id_3 = $request->get('order_id_3');
        $order_id_4 = $request->get('order_id_4');

        $order_id = (int)($order_id_1.$order_id_2.$order_id_3.$order_id_4);

        $participants = Participant::where('order_id', '=', $order_id)->get();
        if($participants != null){
            foreach ($participants as $participant) {
                $participant->is_attend = 1;
                $participant->attend_time = Carbon::now();
                $participant->save();
            }
        }else {
            return redirect()->action('ParticipantController@handleError', ['error_msg' => 'user_not_found']);
        }

    }

    public function registerWithQR(Request $request)
    {
        $token = $request->get('token');

        $participant = Participant::where('token', '=', $token)->first();
        if ($participant != null){
            $participant->is_attend = 1;
            $participant->attend_time = Carbon::now();
            $participant->save();

            return $participant->firstName.' เข้าร่วมงาน!!!';
        }else {
            return redirect()->action('ParticipantController@handleError', ['error_msg' => 'user_not_found']);
        }
    }

    public function gainWithOrderID(Request $request)
    {
        $order_id_1 = $request->get('order_id_1');
        $order_id_2 = $request->get('order_id_2');
        $order_id_3 = $request->get('order_id_3');
        $order_id_4 = $request->get('order_id_4');

        $order_id = (int)($order_id_1.$order_id_2.$order_id_3.$order_id_4);

        $participants = Participant::where('order_id', '=', $order_id)->get();
        if($participants != null){
            foreach ($participants as $participant) {
                if($participant->is_gain == 1){
                    return redirect()->action('ParticipantController@handleError', ['error_msg' => 'already_gain_item']);
                }
                $participant->is_gain = 1;
                $participant->gain_time = Carbon::now();
                $participant->save();
            }
            return redirect()->action('ParticipantController@orderList', ['order_id' => $order_id]);
        }else {
            return redirect()->action('ParticipantController@handleError', ['error_msg' => 'user_not_found']);
        }
    }
    
    public function gainWithQR(Request $request)
    {
        $token = $request->get('token');
        $participant = Participant::where('token', '=', $token)->first();

        if ($participant != null){
            $couple_token = $participant->couple_token;
            $participants = Participant::where('couple_token', '=', $couple_token)->get();

            foreach ($participants as $participant) {
                if($participant->is_gain == 1){
                    return redirect()->action('ParticipantController@handleError', ['error_msg' => 'already_gain_item']);
                }
                $participant->is_gain = 1;
                $participant->gain_time = Carbon::now();
                $participant->save();
            }
            return redirect()->action('ParticipantController@orderList', ['order_id' => $participant->order_id]);

        }else {

        }
    }

    public function getQrCode($token)
    {
        $participant = Participant::where('token', '=', $token)->first();
        $qr = QrCode::format('png')
                ->size(300)
                ->merge('\public\image\sc-su-logo-eng.png', .15)
                ->errorCorrection('H')
                ->generate($participant->token);

        return response($qr, 200)->header('Content-Type', 'image/png');
    }

    public function downloadQrCode($token)
    {
        $participant = Participant::where('token', '=', $token)->first();
        $imgPath = self::createQRImage($participant);

        $name = explode('@', $participant->email);
        $filename = $name[0].'.png';
        $header = ['Content-Type', 'image/png'];
        return response()->download($imgPath, $filename, $header);
    }

    public function getPdf($couple_token)
    {
        $participants = Participant::where('couple_token', '=', $couple_token)->get();
        $participants = self::changeOrderID($participants);
        $participants = self::translateCategory($participants);

        $fpdf = new Fpdf();
        $fpdf->AddPage();
        $i = 0;
        foreach ($participants as $participant){
            $imgPath = self::createQRImage($participant);

            $order_id = $participant->order_id;
            $name = $participant->firstName.' '.$participant->lastName;
            $category = $participant->category;

            $fpdf->Image($imgPath, 10, 10+(120 * $i), 100, 0, 'png');
            $fpdf->Cell(100, 100, '', 1, 0, 'C');

            $fpdf->AddFont('angsa','','angsa.php');
            $fpdf->SetFont('angsa', '', 70);
            $fpdf->Cell(90, 20, iconv( 'UTF-8','TIS-620',$order_id), 1, 1, 'C');
            $fpdf->SetFont('angsa', '', 24);
            $fpdf->Cell(100, 80, '', 0, 0, 'C');
            $fpdf->Cell(90, 60, iconv( 'UTF-8','TIS-620',$name), 1, 1, 'C');

            $fpdf->SetFont('angsa', '', 30);
            $fpdf->Cell(100, 60, '', 0, 0, 'C');
            $fpdf->Cell(90, 20, iconv( 'UTF-8','TIS-620',$category), 1, 0, 'C');

            $fpdf->Ln(40);
            $i++;
        }

        $fpdf->Output();
        exit;
    }

    public function createQRImage($participant)
    {
        QrCode::format('png')
            ->size(500)
            ->merge('\public\image\sc-su-logo-eng.png', .15)
            ->errorCorrection('H')
            ->generate($participant->token, '../public/qrcode/'.$participant->token.'.png');

        $imgPath = '../public/qrcode/'.$participant->token.'.png';
        return $imgPath;
    }

    public function translateCategory($participants)
    {
        foreach ($participants as $participant){
            if($participant->category == 'teacher')
                $participant->category = 'อาจารย์';

            elseif ($participant->category == 'staff')
                $participant->category = 'เจ้าหน้าที่';

            elseif ($participant->category == 'alumni')
                $participant->category = 'ศิษย์เก่า';

            elseif ($participant->category == 'student')
                $participant->category = 'นักศึกษา';

            elseif ($participant->category == 'person')
                $participant->category = 'บุคคลทั่วไป';
        }
        return $participants;
    }

    public function orderList($order_id)
    {
        $orderData = [];

        $itemOrders = ItemOrder::where('order_id', '=', $order_id)->get();
        $price = 0;
        foreach ($itemOrders as $itemOrder){
            $itemOrder->item;
            $price += $itemOrder->item->price * $itemOrder->amount;
            $orderData[$itemOrder->item_id] = $itemOrder;
        }

        if($order_id < 10)
            $order_id = '000'.$order_id;
        elseif ($order_id < 100)
            $order_id = '00'.$order_id;
        elseif ($order_id < 1000)
            $order_id = '0'.$order_id;

        $orderData['total_price'] = number_format($price);
        $orderData['order_id'] = $order_id;
        //return $orderData;

        return view('participant.order', ['orderData' => $orderData]);
    }

    public function handleError($error_msg)
    {
        $error_message = [];
        if($error_msg == 'user_not_found'){
            $error_message = [
                'header'    =>  'ไม่พบลำดับการบริจาคบูชานี้ในระบบ',
                'content'   =>  'กรุณาตรวจสอบลำดับการบริจาคบูชาของท่าน หรือติดต่อผู้ดูแลระบบ'
            ];
        }
        elseif ($error_msg == 'already_register'){
            $error_message = [
                'header'    =>  'ลำดับการลำดับการบริจาคบูชานี้ได้ลงทะเบียนแล้ว',
                'content'   =>  'กรุณาตรวจสอบลำดับการบริจาคบูชาของท่าน หรือติดต่อผู้ดูแลระบบ'
            ];
        }
        elseif ($error_msg == 'already_gain_item'){
            $error_message = [
                'header'    =>  'ท่านได้รับของเรียบร้อยแล้ว',
                'content'   =>  'กรุณาตรวจสอบลำดับการบริจาคบูชาของท่าน หรือติดต่อผู้ดูแลระบบ'
            ];
        }

        return view('error', ['error_message' => $error_message]);
    }

    public function changeOrderID($participants)
    {
        foreach ($participants as $participant){
            if($participant->order_id < 10)
                $participant->order_id = '000'.$participant->order_id;
            elseif ($participant->order_id < 100)
                $participant->order_id = '00'.$participant->order_id;
            elseif ($participant->order_id < 1000)
                $participant->order_id = '0'.$participant->order_id;
        }

        return $participants;
    }
}
