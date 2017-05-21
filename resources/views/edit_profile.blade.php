@extends('layouts.edit_profile')

@section('controls')
    <form class='form-horizontal' role='form' method='POST' action="update_profile">
            {{ csrf_field() }}
            <h3>Basic information</h3>

            <div class='form-group'>
              <label for="name" class="col-md-4 control-label">Name</label>
              <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
              </div>
            </div>

            <div class='form-group'>
              <label for="email" class="col-md-4 control-label">Email</label>
              <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>
              </div>
            </div>

            <div class='form-group'>
              <label for="about" class="col-md-4 control-label">About</label>
              <div class="col-md-6">
                  <textarea id="about" class="form-control vertical" name="about" rows='4'>{{$user->about}}</textarea>
              </div>
            </div>


            <br/>


            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
            </div>

          </form>
@endsection
