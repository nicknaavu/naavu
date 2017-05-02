@extends('layouts.app')

@section('style')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class='container'>
  <div class='row'>
      <div class='col-md-8 col-md-offset-2'>
        <div class='panel panel-default'>
          <div class='panel-heading'>Compose message</div>
          <div class='panel-body'>
            <form class='form-horizontal' role='form' method="post" action='create_thread'>
            {{ csrf_field() }}

              <div class='form-group'>
                <label for='recipient' class='col-md-4 control-label'>To</label>
                <div class='col-md-6'>
                  <select class="form-control" id="recipient" name='recipient'>
                    @foreach($users as $user)
                      <option value='{{$user->id}}'>{{$user->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class='form-group'>
                <label for='subject' class='col-md-4 control-label'>Subject</label>
                <div class='col-md-6'>
                  <input class='form-control' name='subject' id='subject' required>
                </div>
              </div>

              <div class='form-group'>
                <label for='body' class='col-md-4 control-label'>Body</label>
                <div class='col-md-6'>
                  <textarea class='form-control vertical' name='body' id='body' required></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
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
</div>
@endsection
