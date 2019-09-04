<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    //
    public function create(){
        //$channels = channel::orderBy('name')->get();
        return view('post.create');
    }
}
