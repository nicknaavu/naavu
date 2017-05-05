@extends('layouts.app')

@section('content')

<div class='container'>
  <div class="row">
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h2>Compose post</h2>
        </div>
        <div class='panel-body'>
          <form role='form' action="{{ route('create_post') }}" class="form-horizontal" method="post">
            {{csrf_field()}}

            <div class='form-group'>
              <label for='project_id' class='col-md-4 control-label'>Project</label>
              <div class='col-md-6'>
                <select class="form-control" name='project_id' selected='1'>
                  <option value=""><i>No project</i></option>
                  @foreach(Auth::user()->projects as $project)
                    <option value='{{$project->id}}'
                      @if($project->id == $project_id)
                      selected='selected'
                      @endif
                      >{{$project->project}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="title" class="col-md-4 control-label">Title</label>
              <div class="col-md-6">
                  <input type="text" class="form-control" name="title" required>
              </div>
            </div>

            <div class='form-group'>
              <label for="body" class="col-md-4 control-label">Body</label>
              <div class="col-md-6">
                  <textarea class="form-control vertical" name="body" rows='4'></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
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
