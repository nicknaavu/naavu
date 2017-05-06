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

  </div>
</div>
@endsection
