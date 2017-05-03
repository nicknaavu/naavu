<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Project;

class search extends Controller
{
    public function find_users()
    {
      return view('find_users',[
        'users'=>User::all()
      ]);
    }
    public function find_projects()
    {
      return view('find_projects',[
        'projects'=>Project::all()
      ]);
    }
}
