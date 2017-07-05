<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Project;
use Auth;

class search extends Controller
{
    public function find_users(Request $request)
    {
    if ($str = $request->str)
      {
        $users = User::where('name',"LIKE","%$str%")->get();      
      }
    else
      {
        $users = User::all();
      }
      return view('find_users',[
        'users'=>$users
        ]);
    }
    public function find_projects()
    {
      return view('find_projects',[
        'projects'=>Project::all()
      ]);
    }
}
