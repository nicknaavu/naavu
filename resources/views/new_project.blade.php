@extends('layouts.app')

@section('style')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          Create new project
        </div>
        <div class="panel-body">
          <form role="form" method="post" class="form-horizontal" action="{{route('create_project')}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name" class="col-md-4 control-label">Project name</label>
              <div class="col-md-6">
                  <input id="name" name="name" type="text" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label for="description" class="col-md-4 control-label">Description</label>
              <div class="col-md-6">
                  <textarea id="description" name="description" class="form-control vertical" required></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Create project
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
