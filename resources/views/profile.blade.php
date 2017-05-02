@extends('layouts.app')

@section('script')
  <script type='text/javascript' src="{{asset('js/test.js')}}"  ></script>
@endsection

@section('content')
<div class='container'>
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h1><strong>{{$user->name}}</strong>
        @if(Auth::user()->id == $user->id)
          <a href="{{route('edit_profile')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        @endif
        </h1>
      </div>
      <div class='panel-body'>
        {{$user->about}}
      </div>
      @if(Auth::user()->id !== $user->id AND count(Auth::user()->projects) > 0)
        <div class='panel-footer'>
          <form role='form' class="form-horizontal" method='post' action='{{route('invite_to_project')}}'>
            {{csrf_field()}}
            <input type='hidden' name='recipient_id' value='{{$user->id}}'/>
            <div class="form-group">
              <label for='invitation_project' class='col-md-2 control-label'>
                Invite {{$user->name}} to:
              </label>
              <div class='col-md-4'>
                <select class='form-control' name='invitation_project' id='invitation_project'>
                  @foreach(Auth::user()->projects as $project)
                    <option value='{{$project->id}}'>
                      {{$project->project}}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class='col-md-4 col-md-offset-2'>
                <input type='submit' class='btn btn-default' value='invite'>
              </div>
            </div>

          </form>
        </div>
      @endunless
    </div>

    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h3>skills</h3>
      </div>
      <div class='panel-body'>
        @if(count($user->skills) > 0)
          @foreach($user->skills as $skill)
            <div>
              <h4>{{$skill->skill}}</h4>
              {{$skill->description}}
            </div>
          @endforeach
        @else
          No skills yet!
        @endif
      </div>
    </div>

    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h3>interests</h3>
      </div>
      <div class='panel-body'>
        @if(count($user->interests) > 0)
          @foreach($user->interests as $interest)
            <div>
              <h4>{{$interest->interest}}</h4>
              {{$interest->description}}
            </div>
          @endforeach
        @else
          No interests yet!
        @endif
      </div>
    </div>

    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h3>projects</h3>
      </div>
      <div class='panel-body'>
        @if(count($user->projects) > 0)
          @foreach($user->projects as $project)
            <div>
              <a href="/project/{{$project->id}}"><h4>{{$project->project}}</h4></a>
              {{$project->description}}
            </div>
          @endforeach
        @else
          No projects yet!
        @endif
      </div>
    </div>

  </div>
</div>
@endsection
