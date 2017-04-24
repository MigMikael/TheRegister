<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $participants = Participant::orderBy('order_id', 'desc')->paginate(15);
        $participants = $this->translateCategory($participants);
        return view('admin.index', ['participants' => $participants]);
    }

    public function show($order_id)
    {
        $participants = Participant::where('order_id', '=', $order_id)->get();

        $participants = self::translateCategory($participants);
        $participants = self::changeOrderID($participants);

        return view('admin.show', ['participants' => $participants]);
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

    public function search()
    {
        $search_option = [
            'order_id' => 'ลำดับสั่งซื้อ',  'full_name' => 'ชื่อ-นามสกุล'
        ];
        return view('admin.search', ['search_option' => $search_option]);
    }

    public function query(Request $request)
    {
        $search_option = [
            'order_id' => 'ลำดับสั่งซื้อ',  'full_name' => 'ชื่อ-นามสกุล'
        ];

        $search_by = $request->get('search_by');
        $query = $request->get('query');
        if($search_by == 'order_id'){
            $participants = Participant::where('order_id','=', $query)->get();
            $count = Participant::where('order_id', $query)->count();
        }else{
            $participants = Participant::where('name','=', $query)->get();
            $count = Participant::where('name', $query)->count();
        }


        if($count >= 1){
            return view('admin.search', [
                'search_option' => $search_option,
                'participants' => $participants
            ]);
        }
        else{
            return view('admin.search', [
                'search_option' => $search_option,
            ]);
        }
    }
}
