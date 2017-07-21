@extends('layouts.app')

@section('content')

<div class='container'>
  <div class="row">
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h2>Leave a review</h2>
        </div>
        <div class='panel-body'>



          <form role='form' class="form-horizontal" method='post' action='{{route('leave_review')}}'>
            {{csrf_field()}}
            <input type='hidden' name='reviewee_id' value='{{$user->id}}'/>

            <div class="form-group">
              <label for='invitation_project' class='col-md-2 control-label'>
                Leave a review for {{$user->name}}:
              </label>
              <div class='col-md-4'>
                <select class='form-control' name='project_id' id='project_id'>
                  @foreach($shared_projects->where('reviewed',0) as $project)
                    @if($project->reviewed !== 1)
                      <option value='{{$project->id}}'>
                        {{$project->project}}
                      </option>
                    @endif
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
              <div class='col-md-4 col-md-offset-2'>
                <a href='{{ route('profile_by_id',['id'=>$user->id])   }}' class='btn btn-danger'>cancel</a>
                <input type='submit' class='btn btn-default' value='leave review'>
              </div>

            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>





@endsection
