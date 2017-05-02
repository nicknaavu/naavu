<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use DB;
Use App\Skill;

class skills extends Controller
{
    public function edit_skill(){

      return view('edit_skill',[
        'skills' => Auth::user()->skills
      ]);
    }

    public function update_skill(Request $request){

      //Update existing skills
      if($request->skills)
        {
          foreach($request->skills as $x)
            {
              //Load the existing skill
              $skill = Skill::find($x["id"]);

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
              $skill = new Skill;
              $skill->user_id = Auth::id();
              $skill->level = 1; //Set level to 1 for now; will fix this
              foreach($fields as $y){$skill->$y = $x[$y];}
              $skill->save();
            }
        }

        return redirect('edit_skill');
    }

    public function delete_skill(Request $request)
      {
        Skill::destroy($request->id);
      }
}
