@extends('layouts.edit_profile')

@section('script')
<script src="{{ asset('js/edit_projects.js') }}"></script>
@endsection

@section('controls')
  <h3>Projects</h3>

  @if(count($user->projects) > 0)
    @foreach($user->projects as $project)
      <div id='project_{{$project->id}}'>
        <a href="/project/{{$project->id}}"><h4>{{$project->project}}</h4></a>
        {{$project->description}}<br/s>
        <button class='leave_project' project_id='{{$project->id}}'>Leave project</button>
      </div>
    @endforeach
  @else
    No projects yet!
  @endif
@endsection
