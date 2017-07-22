<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
Use App\Project_skill;
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

  public function edit_project_skills($id)
    {
      return view('edit_project_skills',[
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

  public function update_project_skill(Request $request){

    //Update existing skills
    if($request->skills)
      {
        foreach($request->skills as $x)
          {
            //Load the existing skill
            $skill = Project_skill::find($x["id"]);

            //Update skill and description
            foreach(['skill','description'] as $y){$skill->$y = $x[$y];}
            $skill->save();
          }
      }

    //Organize data for new skills
    $fields = ['skill','description'];  //Field array names from table
    foreach($fields as $field) //For each of these fields, pull all the pieces into an ordered array
      {
        foreach($request->$field as $key=>$value)
        {
          $new_skills[$key][$field] = $value;
        }
      }

    //Input new skills
    foreach ($new_skills as $x)
      {
        if($x['skill'])
          {
            $skill = new Project_skill;
            $skill->project_id = $request->project_id;
            $skill->level = 1; //Set level to 1 for now; will fix this
            $skill->status = 0; //Default is that skill is unfilled
            foreach($fields as $y){$skill->$y = $x[$y];}
            $skill->save();
          }
      }

      return redirect(route('edit_project_skills',[
        'id'=>$request->project_id
        ]));
  }

  public function delete_project_skill(Request $request)
    {
      Project_skill::destroy($request->id);
    }

  public function leave_project(Request $request)
  {
    Auth::user()->projects()->detach($request->project_id);

    Return Auth::user()->projects;
  }

  public function step_down($project_id)
    {
      Auth::user()->projects()->updateExistingPivot($project_id,['status'=>0]);
      return redirect()->route('edit_projects');
    }
}
