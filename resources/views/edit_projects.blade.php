@extends('layouts.edit_profile')

@section('script')
<script src="{{ asset('js/edit_projects.js') }}"></script>
@endsection

@section('controls')
  <h3>Projects</h3><br/>

  @if(count($user->projects) > 0)
    @foreach($user->projects as $project)
      <div id='project_{{$project->id}}'>
        <a href="/project/{{$project->id}}"><h4>{{$project->project}}</h4></a>
        {{$project->description}}<br/s>
        <button class='leave_project btn btn-danger' project_id='{{$project->id}}'>Leave project</button>
        @if($project->pivot->status > 0)
          <a class='btn btn-danger' href="{{ route('step_down',['project_id'=>$project->id]) }}">Step down as rep</a>
        @endif
      </div>
    @endforeach
  @else
    No projects yet! <br/>
    <a href='{{ route('new_project') }}'>Create a project</a>
  @endif
  
  <a href="{{ route('profile') }}" class="btn btn-default">back to profile</a>
@endsection


