<?php

namespace App\Observers;

use App\Post;

class PostObserver
{
    public function deleting(Post $post)
    {
        //Delete notifications related to this post
        $post->notifications()->delete();
    }
}