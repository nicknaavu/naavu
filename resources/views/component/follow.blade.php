<div class='clearfix'>
{{ count($followable->follows) }} 

@if(count($followable->follows) == 1)
  follower
@else
  followers
@endif


@if($followable->id !== Auth::id())
  @if($followable->follows->pluck('follower_id')->contains(Auth::id()))
  <button class='unfollow btn btn-success pull-right' target={{$target}} followable_type='{{get_class($followable)}}' followable_id="{{$followable->id}}">Followed</button>
  @else
  <button class='follow btn btn-default pull-right' target={{$target}} followable_type='{{get_class($followable)}}' followable_id="{{$followable->id}}">Follow</button>
  @endif
@endif
</div>