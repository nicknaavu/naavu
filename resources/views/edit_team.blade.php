@extends('layouts.app')

@section('style')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class='container'>



  <div class='row'>
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'>

          <ul class="nav nav-pills">
            <li role="presentation"><a href="{{route('edit_project',['id'=>$project->id])}}">Basic info</a></li>
            <li role="presentation" class="active"><a href="#">Team</a></li>
            <li role="presentation"><a href="{{route('edit_project_skills',['id'=>$project->id])}}">Skills needed</a></li>
          </ul>

        </div>
        <div class='panel-body'>
          @foreach($project->users as $user)
            <a href="{{route('profile_by_id',['id'=>$user->id])}}">{{$user->name}}</a>

              @if($user->pivot->status == 1)
                Team rep
              @elseif($user->pivot->status == 0 AND $project->reps()->pluck('id')->containsStrict(Auth::id() ) )
                <form role='form' method='post' action='{{ route('invite_to_rep')   }}'>
                  {{ csrf_field() }}
                  <input type='hidden' name='recipient_id' value='{{$user->id}}'>
                  <input type='hidden' name='invitation_project' value='{{$project->id}}'>
                  <button class='btn btn-default' type='submit' value='Invite'>Invite to be rep</button>
                </form>
              @endif

            <hr />
          @endforeach
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          This is where I'll have a menu to invite people
        </div>
      </div>


    </div>
  </div>
</div>
@endsection