@extends('layouts.app')

@section('content')

<div id='container'>
  <div id='row'>
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h3>Notifications</h3>
        </div>
        <div class='panel-body'>
          @foreach(Auth::user()->recipient_notifications as $notification)

            @if($notification->type ==1)
              <a href='{{route('profile_by_id',['id'=>$notification->sender->id])}}'>{{$notification->sender->name}}</a>
              has invited you to join the project
              <a href="{{route('project',['id'=>$notification->notifiable->id])}}">{{$notification->notifiable->project}}</a>
              <a href="{{route('accept_invitation',['id'=>$notification->id])}}" class='btn btn-default'>Join</a>
            @endif
            <hr />
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>




@endsection
