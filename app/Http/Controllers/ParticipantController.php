<?php

namespace App\Http\Controllers;

use App\Helper\TokenGenerator;
use App\Participant;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;

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
        //return $order_id+1;

        if($order_id > 0 && $order_id <= 1000){
            $num = Participant::where('order_id', '=', $order_id)->count();
            if($num < 2){
                return redirect()->action('ParticipantController@step1', ['order_id' => $order_id]);
            }else{
                return response()->json(['msg' => 'Quota Exceed, Maximum is 2 persons!']);
            }
        }else{
            return response()->json(['msg' => 'Sorry, This OrderID is invalid or already register!']);
        }
    }

    public function step1($order_id)
    {
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
            'order_id' => $order_id
        ]);
    }

    public function step2($order_id)
    {
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
            'order_id' => $order_id
        ]);
    }

    public function step3($order_id)
    {
        $participants = Participant::where('order_id', '=', $order_id)->get();

        return view('participant.show', ['participants' => $participants]);
    }

    public function storeStep1(Request $request)
    {
        $participant = $request->all();

        $token = (new TokenGenerator())->generate(10);
        $participant['token'] = $token;

        $participant = Participant::create($participant);

        return redirect()->action('ParticipantController@step2', ['order_id' => $participant->order_id]);
    }

    public function storeStep2(Request $request)
    {
        $participant = $request->all();

        $token = (new TokenGenerator())->generate(10);
        $participant['token'] = $token;

        $participant = Participant::create($participant);

        return redirect()->action('ParticipantController@step3', ['order_id' => $participant->order_id]);
    }

    public function edit($id)
    {
        $category = [
            'teacher' => 'อาจารย์',
            'staff' => 'เจ้าหน้าที่',
            'alumni' => 'ศิษย์เก่า',
            'student' => 'นักศึกษา',
            'person' => 'บุคคลทั่วไป'
        ];
        $participant = Participant::findOrFail($id);

        return view('participant.edit', [
            'url' => 'participant/'.$participant->id,
            'category' => $category,
            'order_id' => $participant->order_id,
            'participant' => $participant
        ]);
    }

    public function update(Request $request, $id)
    {
        $editParticipant = $request->all();
        $participant = Participant::findOrFail($id);
        $participant->update($editParticipant);

        return redirect()->action('ParticipantController@step3', ['order_id' => $participant->order_id]);
    }

    #-------------------------------------------------------------------------------------------------------------------

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
            echo 'please register';
        }
    }

    public function gainItem(Request $request)
    {
        $token = $request->get('token');

        $participant = Participant::where('token', '=', $token)->first();
        if ($participant != null){
            $participant->is_gain = 1;
            $participant->gain_time = Carbon::now();
            $participant->save();

            return $participant->firstName.' ได้รับของเรียบร้อย!!!';
        }else {
            echo 'please register';
        }
    }

    public function scan()
    {
        return view('scan');
    }

    public function getQrCode($id)
    {
        $participant = Participant::findOrFail($id);
        $qr = QrCode::format('png')
                ->size(400)
                ->merge('\public\image\sc-su-logo-eng.png', .15)
                ->errorCorrection('H')
                ->generate($participant->token);

        return response($qr, 200)->header('Content-Type', 'image/png');
    }
}
