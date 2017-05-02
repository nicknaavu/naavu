@extends('layouts.app')

@section('style')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class='container'>
  <div class='row'>
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'><h3>{{$thread->subject}}</h3></div>
        <div class='panel-body'>
          @foreach($thread->messages as $message)
              <a href='/profile/{{$message->user->id}}'>{{$message->user->name}}</a><br/>
            {{$message->body}}
            @unless($loop->last)
              <hr>
            @endunless
          @endforeach
        </div>
      </div>
      <div class='well'>
        <form class='form-horizontal' method="POST" role="form" action="{{route('add_message')}}">
          {{ csrf_field() }}

          <input type='hidden' name='thread' value='{{$thread->id}}'>
          <div class='form-group'>
            <div class='col-md-8'>
              <textarea class='form-control vertical' name='body' id='body' placeholder="Reply" required></textarea>
            </div>
          <div class="col-md-2">
              <button type="submit" class="btn btn-primary">
                Send
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>









@endsection
