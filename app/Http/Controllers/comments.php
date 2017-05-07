<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\Project;
Use Auth;

class comments extends Controller
{
    public function add_post_comment(Request $request)
      {
        //Create comment
        $comment = new Comment;
        $comment->body = $request->body;

        //Associate with sender
        $commenter = Auth::user();
        $comment->commenter()->associate($commenter);

        //Connect to post and save
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);

        return redirect()->route('post',['id'=>$request->post_id]);
      }

    public function add_project_comment(Request $request)
      {
        //Create comment
        $comment = new Comment;
        $comment->body = $request->body;

        //Associate with sender
        $commenter = Auth::user();
        $comment->commenter()->associate($commenter);

        //Connect to post and save
        $project = Project::find($request->project_id);
        $project->comments()->save($comment);

        return redirect()->route('project',['id'=>$request->project_id]);
      }
}
