<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Like;
Use App\User;
Use App\Project;
Use App\Follow;
Use Auth;

class follows extends Controller
{
  public function follow(Request $request)
    {
      //Create new like
      $follow = new Follow;

      //Associate with liker
      $follow->follower()->associate(Auth::user());

      //Load morph and save
      $request->followable_type::find($request->followable_id)->follows()->save($follow);

      return view('component.follow',['followable'=>$request->followable_type::find($request->followable_id),'target'=>$request->target])->render();
    }

  public function unfollow(Request $request)
    {
      //Delete follows
      Follow::where('follower_id',Auth::id())->
        where('followable_type',$request->followable_type)->
        where('followable_id',$request->followable_id)->
        delete();

        return view('component.follow',['followable'=>$request->followable_type::find($request->followable_id),'target'=>$request->target])->render();
    }
}
