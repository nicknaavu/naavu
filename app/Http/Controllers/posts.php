<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use App\User;
Use App\Project;
Use App\Post;
Use App\Events\NewPost;

class posts extends Controller
{
    public function compose_post($project_id='')
      {
        return view('compose_post',[
          'project_id'=>$project_id
        ]);
      }

    public function create_post(Request $request)
        {
          $post = new Post;
          foreach(['title','body','project_id'] as $field){$post->$field = $request->$field;}
          $post->user_id = Auth::id();
          $post->save();

          //Trigger event
          event(new NewPost($post));

          return redirect()->route('post',[
            'id'=>$post->id
            ]);
        }

    public function post($post_id)
      {
        return view('post',[
          'post'=>Post::find($post_id)
        ]);
      }

    public function delete_post($post_id)
      {
        Post::destroy($post_id);
        return redirect('profile');
      }
}
