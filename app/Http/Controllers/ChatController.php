<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        return view('chat.index');
    }

    public function chat_convers($user){
        return view('chat.chat_convers',compact('user'));
    }
}
