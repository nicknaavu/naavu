@extends('layouts.app')

@section('style')

@endsection


@section('content')
<div class='container'>

  @foreach($threads as $thread)
    <div class='row'>
      <div class='col-md-8 col-md-offset-2'>
        <div class='panel panel-default'>
          <div class='panel-body clickable' target='/thread/{{$thread->id}}'>
            <div class='col-md-4'>
              <strong>{{$thread->subject}}</strong>
            </div>
            <div class='col-md-4'>
              <i>
                @foreach($thread->users as $user)
                  <a href='/profile/{{$user->id}}'>{{$user->name}}</a>,
                @endforeach
              </i>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach


</div>

@endsection
