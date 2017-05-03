@extends('layouts.app')

@section('content')
<div class="container">
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        Find users
      </div>
      <div class="panel-body">
        @foreach($users as $user)
          <a href="{{ route('profile_by_id',['id'=>$user->id])    }}">{{$user->name}}</a><hr>

        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
