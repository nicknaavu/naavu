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
          @component('component.user_link',['user'=>$user]) @endcomponent
          <hr>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
