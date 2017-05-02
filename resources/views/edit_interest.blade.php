@extends('layouts.app')

@section('style')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection

@section('script')
<script src="{{ asset('js/edit_interest.js') }}"></script>
@endsection

@section('content')

<div class='container'>
  <div class='row'>
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'>

          <ul class="nav nav-pills">
            <li role="presentation"><a href="edit_profile">Basic info</a></li>
            <li role="presentation"><a href="edit_interest">Skills</a></li>
            <li role="presentation" class="active"><a href="#">Interests</a></li>
          </ul>

        </div>
        <div class='panel-body'>
          <form class="form-horizontal" role="form" method="post" action="update_interest">
            {{ csrf_field() }}
          <h3>Interests</h3>


            @foreach($interests as $interest)
            <div id='interest_{{$interest->id}}'>
              <div class="form-group">
                <label for="interest" class="col-md-4 control-label">Skill</label>
                <div class="col-md-6">
                    <input id="interests[{{$interest->id}}][interest]" type="text" class="form-control" name="interests[{{$interest->id}}][interest]" value="{{$interest->interest}}" required>
                </div>
              </div>

              <div class='form-group'>
                <input type='hidden' id="interests[{{$interest->id}}][id]" name="interests[{{$interest->id}}][id]" value="{{$interest->id}}">
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
                    <textarea id="interests[{{$interest->id}}][description]" class="form-control vertical" name="interests[{{$interest->id}}][description]" rows='4'>{{$interest->description}}</textarea>
                </div>
              </div>

              <div class='form-group'>
                <div class='col-md-6 col-md-offset-4'>
                  <a href='javascript:delete_interest({{$interest->id}})'>Delete</a>
                </div>
              </div>
            </div>
            @endforeach



            <div id='new_interests'></div>
            @if(count($interests) == 0)
            <div id='new_interests_template' class=''>
              <div class="form-group">
                <label for="interest" class="col-md-4 control-label">Skill</label>
                <div class="col-md-6">
                    <input id="interest[]" type="text" class="form-control" name="interest[]" value="">
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

            <div id='new_interests_template' class='hidden template'>
              <div class="form-group">
                <label for="interest" class="col-md-4 control-label">Skill</label>
                <div class="col-md-6">
                    <input id="interest[]" type="text" class="form-control" name="interest[]" value="">
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
                <a href="javascript:add_interest_field()">
                  Add a new interest
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
