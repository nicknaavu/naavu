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
      <div class='panel-body'>
        @foreach($project->users as $user)
          <a href="/profile/{{$user->id}}">{{$user->name}}</a><hr>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
