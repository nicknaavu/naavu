@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='row'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        <h2>{{$post->title}}</h2>
        @if($post->project != '')
          <a href="{{ route('project',['id'=>$post->project->id]) }}">{{$post->project->project}}</a>
        @endif
        @if($post->user->id == Auth::id())
          <a class='btn btn-danger' href="{{ route('delete_post',['post_id'=>$post->id])}}">Delete post</a>
        @endif
      </div>
      <div class='panel-body'>
        {{$post->body}}
      </div>
      <div class='panel-footer' id='like_post'>
        @component('component.like',['likable'=>$post,'target'=>'like_post']) @endcomponent
      </div>
      <div class='panel-footer'>
        @if(count($post->comments) > 0)
          @foreach($post->comments as $comment)
            <a href="{{ route('profile',['id'=>$comment->commenter->id]) }}">{{$comment->commenter->name}}</a>
            <br/>
            {{$comment->body}}
            <hr>
          @endforeach
        @endif
        <form class='form-horizontal' method="POST" role="form" action="{{ route('add_post_comment')  }}">
          {{ csrf_field() }}
          <input type='hidden' name='post_id' value='{{$post->id}}'>
          <div class='form-group'>
            <div class='col-md-8'>
              <textarea class='form-control vertical' name='body' id='body' placeholder="Add a comment" required></textarea>
            </div>
          </div>
          <div class='form-group'>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">
                Comment
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
</div>
@endsection
