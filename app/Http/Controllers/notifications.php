<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
Use App\User;
Use App\Project;
Use Auth;

class notifications extends Controller
{
    public function invite_to_project(Request $request)
    {
      //Create invitation
      $notification = new Notification;
      $notification->type=1;

      //Associate with sender
      $sender = Auth::user();
      $notification->sender()->associate($sender);

      //Associate with recipient
      $recipient = User::find($request->recipient_id);
      $notification->recipient()->associate($recipient);

      //Connect to project and save
      $project = Project::find($request->invitation_project);
      $project->notifications()->save($notification);

      return $notification;
    }

  public function view_notifications()
  {
    return view('view_notifications');
  }

  //Accept invitation to join project
  public function accept_invitation(Request $request)
    {
      //Add user to project as regular user
      Project::find(Notification::find($request->id)->notifiable_id)
        ->users()
        ->attach(Notification::find($request->id)->recipient_id,[
          'status'=>0
        ]);

      //Delete notification
      Notification::destroy($request->id);

      return view('view_notifications');
    }
}
