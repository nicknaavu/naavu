<div class='clearfix'>
Likes: {{ count($likable->likes) }}

@if($likable->likes->pluck('liker_id')->contains(Auth::id()))
<button class='unlike btn btn-success pull-right' target={{$target}} likable_type='{{get_class($likable)}}' likable_id="{{$likable->id}}">Liked</button>
@else
<button class='like btn btn-default pull-right' target={{$target}} likable_type='{{get_class($likable)}}' likable_id="{{$likable->id}}">Like this</button>
@endif
</div>
