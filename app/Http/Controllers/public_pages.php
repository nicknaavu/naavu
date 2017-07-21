<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Review;
Use Auth;
Use DB;


class public_pages extends Controller
{
  public function profile($id)
  {
    //Get user
    $user = User::findOrFail($id);

    //Projects left to review
    if(Auth::user() !== $user)
      {
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
      }

    //Package variables
    $vars = compact('user','shared_projects');

    //Return view
    return view('profile')->with($vars);
  }

  public function project($id)
  {
    return view('project',[
      'project'=>Project::findOrFail($id)
    ]);
  }
}
