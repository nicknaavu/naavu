<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
Use Auth;
Use DB;


class public_pages extends Controller
{
  public function profile($id)
  {
    return view('profile',[
      'user'=>User::findOrFail($id)
    ]); //Temporary - will replace with real splash page
  }

  public function project($id)
  {
    return view('project',[
      'project'=>Project::findOrFail($id)
    ]);
  }
}
