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
            <li role="presentation"><a href="{{route('edit_team',['id'=>$project->id])}}">Basic info</a></li>
            <li role="presentation" class="active"><a href="#">Team</a></li>
          </ul>

        </div>
        <div class='panel-body'>
          @foreach($project->users as $user)
            <a href="{{route('profile_by_id',['id'=>$user->id])}}">{{$user->name}}</a> (Invitation to become a rep) <hr />
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
