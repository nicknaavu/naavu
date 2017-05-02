<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Thread;
Use App\Message;
use Auth;

class messaging extends Controller
{
  public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('web');
    }

  public function compose_message()
    {
      return view('compose_message',[
        //Retrieve all users but the current user
        'users'=>User::where('id', '!=', Auth::id())->get()
      ]);
    }

  public function create_thread(Request $request)
      {
        $thread = new Thread;

        //Create the thread entry
        $thread->subject = $request->subject;
        $thread->save();

        //Attach the sender
        Thread::find($thread->id)->users()->attach(Auth::id());

        //Attach the recipient
        Thread::find($thread->id)->users()->attach($request->recipient);

        //Create the message
        $message = new Message;
        $message->thread_id = $thread->id;
        $message->user_id = Auth::id();
        $message->body = $request->body;
        $message->save();

        return redirect('compose_message');
      }

  public function view_threads()
    {
      return view('view_threads', [
        'threads'=>Auth::user()->threads
      ]);
    }

  public function thread($id)
    {
      return view('thread',[
        'thread'=>Thread::find($id)
      ]);
    }

  public function add_message(Request $request)
    {
      //Add new message to table
      $message = new Message();
      $message->thread_id = $request->thread;
      $message->user_id = Auth::id();
      $message->body = $request->body;
      $message->save();

      //Redirect to thread page
      return redirect('/thread/'.$request->thread);
    }
}
