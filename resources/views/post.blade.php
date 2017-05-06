@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h2>{{$post->title}}</h2>
        @if($post->project != '')
          <a href="{{ route('project',['id'=>$post->project->id]) }}">{{$post->project->project}}</a>
        @endif
      </div>
      <div class='panel-body'>
        {{$post->body}}
      </div>
    </div>
</div>
</div>
@endsection
