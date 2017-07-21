@extends('layouts.app')

@section('content')
<div class="container">
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-body'>
        <a href='{{ route('new_project') }}'>Create a project</a>
      </div>
    </div>

    <div class='panel panel-default'>
      <div class='panel-heading'>
        Find projects
      </div>
      <div class="panel-body">
        @foreach($projects as $project)
          @component('component.project_link',['project'=>$project,'form'=>'full']) @endcomponent
          <hr/>

        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
