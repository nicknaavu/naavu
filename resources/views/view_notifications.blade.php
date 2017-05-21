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
          @if(count(Auth::user()->recipient_notifications) > 0)
            @foreach(Auth::user()->recipient_notifications as $notification)

              @if($notification->type ==1)
                @component('component.user_link',['user'=>$notification->sender]) @endcomponent
                has invited you to join the project
                @component('component.project_link',['project'=>$notification->notifiable]) @endcomponent
                <a href="{{route('accept_invitation',['id'=>$notification->id])}}" class='btn btn-default'>Join</a>
              @elseif($notification->type == 2)
                @component('component.user_link',['user'=>$notification->sender]) @endcomponent
                has invited you to be a rep for the project
                @component('component.project_link',['project'=>$notification->notifiable]) @endcomponent
                <a href="{{route('accept_invitation',['id'=>$notification->id])}}" class='btn btn-default'>Accept</a>
              @elseif($notification->type == 3)
                @component('component.user_link',['user'=>$notification->sender]) @endcomponent
                has a new post
                @if($project = $notification->notifiable->project)
                  on @component('component.project_link',['project'=>$project]) @endcomponent
                @endif
                :
                @component('component.post_link',['post'=>$notification->notifiable]) @endcomponent
              @endif
              <hr />
            @endforeach
          @else
            No notifications!
          @endif
        </div>
      </div>
    </div>
  </div>
</div>




@endsection
