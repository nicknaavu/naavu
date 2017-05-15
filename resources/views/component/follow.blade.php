Followers: {{ count($followable->follows) }}

@if($followable->follows->pluck('follower_id')->contains(Auth::id()))
<button class='unfollow btn btn-success' target={{$target}} followable_type='{{get_class($followable)}}' followable_id="{{$followable->id}}">Followed</button>
@else
<button class='follow btn btn-default' target={{$target}} followable_type='{{get_class($followable)}}' followable_id="{{$followable->id}}">Follow this</button>
@endif
