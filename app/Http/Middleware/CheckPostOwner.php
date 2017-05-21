<?php

namespace App\Http\Middleware;

Use App\Post;
Use Auth;
use Closure;

class CheckPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Post::find($request->post_id)->user->id !== Auth::id())
        {
          return redirect('home');
        }

        return $next($request);
    }
}
