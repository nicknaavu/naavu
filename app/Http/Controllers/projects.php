<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;


class projects extends Controller
{
  public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('web');
    }

  public function new_project()
    {
      return view('new_project');
    }

  public function create_project(Request $request)
  {
    $project = new Project;

    //Enter project info
    $project->project = $request->name;
    $project->description = $request->description;
    $project->save();

    //Add creator to project
    Project::find($project->id)->users()->attach(Auth::id(),['status'=>1]); //Set creator to be a project rep

    return redirect(route('project',['id'=>$project->id]));
  }

  public function edit_project($id)
  {
    return view('edit_project',[
      'project'=>Project::findOrFail($id)
    ]);
  }

  public function edit_team($id)
    {
      return view('edit_team',[
        'project'=>Project::findOrFail($id)
      ]);
    }

  public function update_project(Request $request)
    {
      $project = Project::find($request->id);
      foreach(['project','description'] as $field){$project->$field = $request->$field;}
      $project->save();

      return redirect('/edit_project/'.$project->id);
    }
}
