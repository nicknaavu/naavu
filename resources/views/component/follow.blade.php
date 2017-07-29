<div class='clearfix'>


<a data-toggle="modal" data-target="#follower_list">
  {{ count($followable->follows) }} 
  @if(count($followable->follows) == 1)
  follower
@else
  followers
@endif
</a>

<!-- Modal -->
<div id="follower_list" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        @foreach($followable->follows as $follow)
          @component('component.user_link',['user'=>$follow->follower]) @endcomponent
          <hr/>
        @endforeach
      </div>
    </div>

  </div>
</div>




@if($followable->id !== Auth::id())
  @if($followable->follows->pluck('follower_id')->contains(Auth::id()))
  <button class='unfollow btn btn-success pull-right' target={{$target}} followable_type='{{get_class($followable)}}' followable_id="{{$followable->id}}">Followed</button>
  
  @else
  <button class='follow btn btn-default pull-right' target={{$target}} followable_type='{{get_class($followable)}}' followable_id="{{$followable->id}}">Follow</button>
  @endif
@endif
</div>