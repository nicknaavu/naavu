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
            <li role="presentation" class="active"><a href="#">Basic info</a></li>
            <li role="presentation"><a href="{{route('edit_team',['id'=>$project->id])}}">Team</a></li>
            <li role="presentation"><a href="{{route('edit_project_skills',['id'=>$project->id])}}">Skills needed</a></li>
          </ul>

        </div>
        <div class='panel-body'>
          <form class='form-horizontal' role='form' method='POST' action="{{route('update_project')}}">
            {{ csrf_field() }}
            <h3>Basic information</h3>
            <input type='hidden' name='id' value='{{$project->id}}'>
            <div class='form-group'>
              <label for="project" class="col-md-4 control-label">Project name</label>
              <div class="col-md-6">
                  <input id="project" type="text" class="form-control" name="project" value="{{$project->project}}" required autofocus>
              </div>
            </div>

            <div class='form-group'>
              <label for="description" class="col-md-4 control-label">Project description</label>
              <div class="col-md-6">
                  <textarea id="description" class="form-control vertical" name="description" rows='4'>{{$project->description}}</textarea>
              </div>
            </div>
            <br/>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <a href='{{ route('project',['id'=>$project->id]) }}' class='btn btn-default'>back to {{$project->project}}</a>
                <button type="submit" class="btn btn-primary">
                  Save
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
