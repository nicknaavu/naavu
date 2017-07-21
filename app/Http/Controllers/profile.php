<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
use App\User;
Use DB;
Use Route;


class profile extends Controller
{
  public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('web');
    }

  public function profile()
    {
      //Get user
      $user = Auth::user();

      //Set projects to review blank
      $shared_projects = NULL;

      //Package variables
      $vars = compact('user','shared_projects');

      //Return view
      return view('profile')->with($vars);
    }

  public function edit_profile(Request $request)
  {
    return view('edit_profile',[
      'user'=>Auth::user()
    ]);
  }

  public function update_profile(Request $request)
  {
    //Extract vars from request
    foreach(['email','name','about'] as $x){$input_array[$x] = $request->$x;}

    //Update record
    DB::table('users')
      ->where('id',Auth::id())
      ->update($input_array);

    //Unset variables
    unset($input_array);

    return redirect('profile');
  }

  public function edit_projects(Request $request)
    {
      return view('edit_projects',[
        'user'=>Auth::user()
      ]);
    }
}
