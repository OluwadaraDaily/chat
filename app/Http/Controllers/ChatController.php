<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatEvent;

class ChatController extends Controller
{

	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat(){
    	return view('chat');
    }

    public function send(Request $request){
    	// return $request->all();
    	$user = User::find(Auth::id());
        // $message = $request->input('message');
        // broadcast(new Chate($user, $message))->toOthers();
    	broadcast(new ChatEvent($request->message, $user));
    }

 //    public function send(){
 //    	$message = "hello WOrld!";
 //    	$user = User::find(Auth::id());
 //    	event(new ChatEvent($message, $user));
	// }
}
