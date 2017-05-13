@extends('layouts.app')

@section('script')
  <script type='text/javascript' src="{{asset('js/test.js')}}"  ></script>
@endsection

@section('content')
  {{csrf_field()}}

<div class='container'>
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h1><strong>{{$project->project}}</strong>
          @if($project->users->find(Auth::id()))
            @if($project->users->find(Auth::id())->pivot->status > 0)
              <a href="/edit_project/{{$project->id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            @endif
          @endif
        </h1>
      </div>
      <div class='panel-body'>
        {{$project->description}}
      </div>
      <div class='panel-footer' id='like_project'>
        @component('component.like',['likable'=>$project,'target'=>'like_project']) @endcomponent
      </div>
      <div class='panel-footer' id='follow_project'>
        @component('component.follow',['followable'=>$project,'target'=>'follow_project']) @endcomponent
      </div>
    </div>

    <div class='panel panel-default'>
      <div class="panel-heading">
        <h3>Team</h3>
      </div>
      <div class='panel-body'>
        @foreach($project->users as $user)
          <a href="/profile/{{$user->id}}">{{$user->name}}</a>
          @if($user->pivot->status > 0) {{-- If the user is a team rep, indicate so  --}}
            Team rep
          @endif
          <hr>
        @endforeach
      </div>
    </div>

    <div class='panel panel-default'>
      <div class="panel-heading">
        <h3>Needed skills</h3>
      </div>
      <div class='panel-body'>
        @foreach($project->project_skills as $skill)
          <h4>{{$skill->skill}}</h4>
          {{$skill->description}}
          <hr>
        @endforeach
      </div>
    </div>


    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h3>posts</h3>
      </div>
      <div class='panel-body'>
        @if(count($project->posts) > 0)
          @foreach($project->posts as $post)
            <div>
              <a href="/post/{{$post->id}}"><h4>{{$post->title}}</h4></a>
              {{$post->body}}
            </div>
          @endforeach
        @else
          No posts yet!
        @endif
      </div>
    </div>

    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h3>comments</h3>
      </div>
      <div class='panel-body'>
        @if(count($project->comments) > 0)
          @foreach($project->comments as $comment)
            <a href="{{ route('profile',['id'=>$comment->commenter->id]) }}">{{$comment->commenter->name}}</a>
            <br/>
            {{$comment->body}}
            <hr>
          @endforeach
        @endif
        <form class='form-horizontal' method="POST" role="form" action="{{ route('add_project_comment')  }}">
          {{ csrf_field() }}
          <input type='hidden' name='project_id' value='{{$project->id}}'>
          <div class='form-group'>
            <div class='col-md-8'>
              <textarea class='form-control vertical' name='body' id='body' placeholder="Add a comment" required></textarea>
            </div>
          </div>
          <div class='form-group'>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">
                Comment
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
