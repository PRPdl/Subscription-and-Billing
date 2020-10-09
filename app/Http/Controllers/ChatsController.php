<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Events\MessageSent;

class ChatsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //Show chats

    public function index(){
        return view('chat')->with('auth_user', auth()->user());
    }

    //Fetch Messages

    public function fetchMessage(){
        return Message::with('user')->get();
    }

    //Send and Save message

    public function sendMessage(Request $request) {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Sent'];
    }

}
