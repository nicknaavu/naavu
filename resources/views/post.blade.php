@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h2>{{$post->title}}</h2>
        @if($post->)
      </div>
      <div class='panel-body'>
        {{$post->description}}
      </div>
    </div>
</div>
</div>
@endsection
