<?php

namespace App\Http\Controllers;

class ChannelController extends Controller
{
    //
    public function index(){
        //$channels = channel::orderBy('name')->get();
        return view('channel.index');
    }
}
