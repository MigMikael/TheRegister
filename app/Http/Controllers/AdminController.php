<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $participants = Participant::orderBy('order_id', 'desc')->paginate(15);
        return view('admin.index', ['participants' => $participants]);
    }

    public function show($order_id)
    {
        $participants = Participant::where('order_id', '=', $order_id)->get();

        $participants = self::translateCategory($participants);

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
                $participant->catagory = 'บุคคลทั่วไป';
        }
        return $participants;
    }
}
