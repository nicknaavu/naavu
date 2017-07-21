<?php

namespace App\Listeners;

use App\Events\NewReview;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

Use App\Notification;

class NewReviewNotify
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
     * @param  NewReview  $event
     * @return void
     */
    public function handle(NewReview $event)
    {
        //Get the variable
        $review = $event->review;

        //Create the notification
        $notification = new Notification;
        $notification->type=9;  //New review notification

        //Associate with sender
        $reviewer = $review->reviewer;
        $notification->sender()->associate($reviewer);

        //Associate with recipient
        $reviewee = $review->reviewee;
        $notification->recipient()->associate($reviewee);

        //Connect to review and save
        $review->notifications()->save($notification);
    }
}
