@extends('layouts.app')

@section('content')
<div class="container">
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-body'>
        <form role='form' method='get' action='find_users'>
          <input name='str'>
          <button class='btn btn-default' type='submit'>Go</button>
        </form>
      </div>
    </div>
  </div>
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h4>Matching users</h4>
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
