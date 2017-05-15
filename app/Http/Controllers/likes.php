<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Like;
Use App\User;
Use App\Project;
Use Auth;

class likes extends Controller
{
    public function like(Request $request)
      {
        //Create new like
        $like = new Like;

        //Associate with liker
        $like->liker()->associate(Auth::user());

        //Load morph and save
        $request->likable_type::find($request->likable_id)->likes()->save($like);

        return view('component.like',['likable'=>$request->likable_type::find($request->likable_id),'target'=>$request->target])->render();
      }

    public function unlike(Request $request)
      {
        //Delete likes
        Like::where('liker_id',Auth::id())->
          where('likable_type',$request->likable_type)->
          where('likable_id',$request->likable_id)->
          delete();

          return view('component.like',['likable'=>$request->likable_type::find($request->likable_id),'target'=>$request->target])->render();
      }
}
