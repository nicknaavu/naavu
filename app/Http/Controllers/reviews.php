<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Review;
Use DB;
Use App\Events\NewReview;

class reviews extends Controller
{
  public function compose_review($id)
    {
      //Load user from provided id
      $user = User::find($id);

      //Get shared projects
      $shared_projects = Auth::user()->projects->whereIn('id',$user->projects->pluck('id'));

      //Assign whether a review exists
      foreach($shared_projects as $project)
        {
          if(  count(Review::where('project_id',$project->id)
          ->where('reviewer_id',Auth::id())
          ->where('reviewee_id',$user->id)
          ->get()) >  0  )
            {
              $project->reviewed = 1;
            }
        }

      //Package variables and return view
      $vars = compact('user','shared_projects');
      return view('compose_review')->with($vars);
    }

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

      //Trigger event
      event(new NewReview($review));

      //Redirect
      return redirect()->route('profile_by_id',['id'=>$request->reviewee_id]);
    }

    public function edit_review($id)
      {
        //Load review
        $review = Review::find($id);

        //Package variables
        $vars = compact('review');

        //Return view
        return view('edit_review')->with($vars);
      }

    public function update_review(Request $request)
      {
        //Get vars
        foreach(['subject','body'] as $x){$input_array[$x] = $request->$x;}

        //Update record
        DB::table('reviews')
          ->where('id',$request->id)
          ->update($input_array);

        return redirect()->route('profile_by_id',['id'=>Review::find($request->id)->reviewee->id]);
      }

    public function delete_review($id)
      {
        Review::destroy($id);
        return redirect('profile');
      }
}
