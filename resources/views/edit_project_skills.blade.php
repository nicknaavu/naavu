@extends('layouts.app')

@section('style')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection

@section('script')
<script src="{{ asset('js/edit_skill.js') }}"></script>
@endsection

@section('content')
<div class='container'>



  <div class='row'>
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'>

          <ul class="nav nav-pills">
            <li role="presentation"><a href="{{route('edit_project',['id'=>$project->id])}}">Basic info</a></li>
            <li role="presentation"><a href="{{route('edit_team',['id'=>$project->id])}}">Team</a></li>
            <li role="presentation" class="active"><a href="#">Skills needed</a></li>
          </ul>

        </div>
        <div class='panel-body'>
          <form class='form-horizontal' role='form' method='POST' action="#">
            {{ csrf_field() }}

            @foreach($project->project_skills as $skill)
            <div id='skill_{{$skill->id}}'>
              <div class="form-group">
                <label for="skill" class="col-md-4 control-label">Skill</label>
                <div class="col-md-6">
                    <input id="skills[{{$skill->id}}][skill]" type="text" class="form-control" name="skills[{{$skill->id}}][skill]" value="{{$skill->skill}}" required>
                </div>
              </div>

              <div class='form-group'>
                <input type='hidden' id="skills[{{$skill->id}}][id]" name="skills[{{$skill->id}}][id]" value="{{$skill->id}}">
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
                    <textarea id="skills[{{$skill->id}}][description]" class="form-control vertical" name="skills[{{$skill->id}}][description]" rows='4'>{{$skill->description}}</textarea>
                </div>
              </div>

              <div class='form-group'>
                <div class='col-md-6 col-md-offset-4'>
                  <a href='javascript:delete_skill({{$skill->id}})'>Delete</a>
                </div>
              </div>
            </div>
            @endforeach

            <div id='new_skills'></div>
            @if(count($project->project_skills) == 0)
            <div id='new_skills_template' class=''>
              <div class="form-group">
                <label for="skill" class="col-md-4 control-label">Skill</label>
                <div class="col-md-6">
                    <input id="skill[]" type="text" class="form-control" name="skill[]" value="">
                </div>
              </div>

              <div class='form-group'>
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
                    <textarea id="description[]" class="form-control vertical" name="description[]" rows='4'></textarea>
                </div>
              </div>
            </div>
            @endif

            <div id='new_skills_template' class='hidden template'>
              <div class="form-group">
                <label for="skill" class="col-md-4 control-label">Skill</label>
                <div class="col-md-6">
                    <input id="skill[]" type="text" class="form-control" name="skill[]" value="">
                </div>
              </div>

              <div class='form-group'>
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
                    <textarea id="description[]" class="form-control vertical" name="description[]" rows='4'></textarea>
                </div>
              </div>
            </div>

            <div class='form-group'>
              <div class='col-md-6 col-md-offset-4'>
                <a href="javascript:add_skill_field()">
                  Add a new skill
                </a>
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
