<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use DB;

class profile extends Controller
{
  public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('web');
    }

  public function profile()
    {
      $user = Auth::user();
      return view('profile',[
        'user'=>$user,
        'skills'=>$user->skills,
        'interests'=>$user->interests
      ]);
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
}
