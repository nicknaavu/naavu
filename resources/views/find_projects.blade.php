@extends('layouts.app')

@section('content')
<div class="container">
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        Find users
      </div>
      <div class="panel-body">
        @foreach($projects as $project)
          <a href="{{ route('project',['id'=>$project->id])    }}">{{$project->project}}</a><hr>

        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
