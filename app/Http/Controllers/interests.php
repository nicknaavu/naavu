<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use DB;
Use App\Interest;
Use Route;

class interests extends Controller
{
    public function edit_interest(){

      return view('edit_interest',[
        'interests' => Auth::user()->interests
      ]);
    }

    public function update_interest(Request $request){

      //Update existing interests
      if($request->interests)
        {
          foreach($request->interests as $x)
            {
              //Load the existing interest
              $interest = Interest::find($x["id"]);

              //Update interest and description
              foreach(['interest','description'] as $y){$interest->$y = $x[$y];}
              $interest->save();
            }
        }

      //Organize data for new interests
      $fields = ['interest','description'];  //Field array names from table
      foreach($fields as $field) //For each of these fields, pull all the pieces into an ordered array
        {
          foreach($request->$field as $key=>$value)
          {
            $new_interests[$key][$field] = $value;
          }
        }

      //Input new interests
      foreach ($new_interests as $x)
        {
          if($x['interest'])
            {
              $interest = new Interest;
              $interest->user_id = Auth::id();
              foreach($fields as $y){$interest->$y = $x[$y];}
              $interest->save();
            }
        }

        return redirect('edit_interest');
    }

    public function delete_interest(Request $request)
      {
        Interest::destroy($request->id);
      }
}
