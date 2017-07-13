<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Review;

class reviews extends Controller
{
  public function leave_review(Request $request)
    {
      //Create object
      $review = new Review;

      //Input information
      $review->subject = $request->subject;
      $review->body = $request->body;
      $review->project_id = $request->project_id;
      $review->reviewer_id = Auth::id();
      $review->reviewee_id = $request->reviewee_id;

      //Save
      $review->save();
    }
}
