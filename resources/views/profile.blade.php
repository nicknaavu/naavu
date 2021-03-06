@extends('layouts.app')

@section('script')
  <script type='text/javascript' src="{{asset('js/test.js')}}"  ></script>
@endsection

@section('content')

<div class='container'>
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-heading clearfix'>
        <h1><strong>{{$user->name}}</strong>
        @if(Auth::id() == $user->id)
          <a class='btn btn-default pull-right' href="{{route('edit_profile')}}">edit profile</a>
        @endif
        </h1>
      </div>
      <div class='panel-body'>
        <?php echo create_links($user->about) ?>
      </div>

      @if(Auth::check())
      <div class='panel-footer' id='follow_user'>
        @component('component.follow',['followable'=>$user,'target'=>'follow_user']) @endcomponent
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
                  @foreach(Auth::user()->projects->whereNotIn('id',$user->projects->pluck('id')) as $project)
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
      @endif


      @if(count($shared_projects) > 0)
          @if(count($shared_projects->where('reviewed',0)) > 0)
          <div class='panel-footer'>
            <a href='{{ route('compose_review',['id'=>$user->id])  }}'>Leave a review</a>
          </div>
          @endif
        @endif
       @endif
    </div>


    <div class='panel panel-default'>
      <div class='panel-heading clearfix'>
        <h3>skills</h3>
        @component('component.tooltip')
          What practical skills or experiences could you bring to a project?
        @endcomponent
        @if(Auth::id() == $user->id)
          <a class='btn btn-default pull-right' href="{{route('edit_skill')}}">edit skills</a>
        @endif
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
      <div class='panel-heading clearfix'>
        <h3>interests</h3>
        @component('component.tooltip')
        What kinds of projects or what types of work are you interested in considering?
        @endcomponent
        @if(Auth::id() == $user->id)
          <a class='btn btn-default pull-right' href="{{route('edit_interest')}}">edit interests</a>
        @endif
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
      <div class='panel-heading clearfix'>
        <h3>projects</h3>
        @component('component.tooltip')
          Ways you’re already working on changing the world.
        @endcomponent

        @if(Auth::id() == $user->id)
          <a class='btn btn-default pull-right' href="{{route('edit_projects')}}">edit projects</a>
        @endif
      </div>
      <div class='panel-body'>
        @if(count($user->projects) > 0)
          @foreach($user->projects as $project)
            @component('component.project_link',['project'=>$project,'form'=>'full']) @endcomponent
            <hr/>
          @endforeach
        @else
          No projects yet!
        @endif
      </div>
    </div>

    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h3>posts</h3>
        @component('component.tooltip')
          Update everyone about your projects. How are things going? What’s next? Successes? Challenges? Needs?
        @endcomponent
      </div>
      <div class='panel-body'>
        @if(count($user->posts) > 0)
          @foreach($user->posts as $post)
            <div>
              <a href="{{ route('post',['post_id'=>$post->id])   }}"><h4>{{$post->title}}</h4></a>
              {{$post->body}}
            </div>
          @endforeach
        @else
          No posts yet!
        @endif
      </div>
    </div>

    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h3>reviews</h3>
        @component('component.tooltip')
          Your work speaks for itself. But sometimes it’s nice when other people chime in too.
        @endcomponent
      </div>
      <div class='panel-body'>
        @if(count($user->reviews) > 0)
          @foreach($user->reviews as $review)

            <div class='clearfix'>
              <h4>{{$review->subject}}</h4>
              from: @component('component.user_link',['user'=>$review->reviewer]) @endcomponent <br/>
              for project: @component('component.project_link',['project'=>$review->project, 'form'=>'link']) @endcomponent <br/>
              {{$review->body}}<br/>
              @if(Auth::id() == $review->reviewer->id)
                <a class='btn btn-default pull-right' href='{{ route('edit_review',['id'=>$review->id]) }}'>edit</a>
              @endif

            </div>

            <hr/>
          @endforeach
        @else
          No reviews yet!
        @endif
      </div>
    </div>

  </div>
</div>
@endsection
