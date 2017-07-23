@extends('layouts.app')

@section('style')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection

@section('script')
<script src="{{ asset('js/edit_team.js') }}"></script>
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
        <div class='panel-body clearfix'>
          @foreach($project->users as $user)
            @component('component.user_link',['user'=>$user]) @endcomponent

            <div class='pull-right'>
              @if($user->pivot->status == 1)
                <span  class='pull-right'>Team rep</span>
              @elseif($user->pivot->status !== 1 AND $project->reps()->pluck('id')->containsStrict(Auth::id() ) )
              <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                manage
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                @if($user->pivot->status == 0)
                  <li><a href="#" user_id='{{$user->id}}' project_id='{{$project->id}}' class='invite_to_rep'> Invite to be team rep</a>   </li>
                @elseif($user->pivot->status == 2)
                  <li><a href="#"><i>Invited to be rep</i></a></li>
                @endif
                <li role="separator" class="divider"></li>
                <li><a href="#" user_id='{{$user->id}}' project_id='{{$project->id}}' class='remove_from_project'>Remove from project</a></li>
              </ul>
            </div>

              @endif
            </div>
            <hr />
          @endforeach
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          This is where I'll have a menu to invite people
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-body">
          <a href='{{ route('project',['id'=>$project->id]) }}' class='btn btn-default'>back to project</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
