<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $participants = Participant::all();
        return view('admin.index', ['participants' => $participants]);
    }

    public function show($order_id)
    {
        $participants = Participant::where('order_id', '=', $order_id)->get();

        return view('admin.show', ['participants' => $participants]);
    }
}
