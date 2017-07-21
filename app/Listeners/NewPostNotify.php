<?php

namespace App\Listeners;

use App\Events\NewPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

Use App\Notification;
Use Auth;

class NewPostNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewPost  $event
     * @return void
     */
    public function handle(NewPost $event)
    {
      //Get post and project
      $post = $event->post;

      //Get collection of followers of project and post
      if($post->project)
        {
          $project_followers = $post->project->follows->pluck('follower');
          $user_followers = $post->user->follows->pluck('follower');
          $followers = $project_followers->merge($user_followers)->unique();
        }
      else
       {
         $followers = $post->user->follows->pluck('follower');
       }

      //Create the notifications
      foreach($followers as $recipient)
        {
          //Create notification
          $notification = new Notification;
          $notification->type=3;  //New post notification

          //Associate with sender
          $sender = Auth::user();
          $notification->sender()->associate($sender);

          //Associate with recipient
          $notification->recipient()->associate($recipient);

          //Connect to post and save
          $post->notifications()->save($notification);
        }
    }
}
