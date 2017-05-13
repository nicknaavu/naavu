$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function(){
    //Set up clickable
    $('.clickable').click(function(){
      window.location.href = $(this).attr('target');
    });


    //Set up liking
    $('body').on('click','.like',function(){
        var likable_type = $(this).attr('likable_type');
        var likable_id = $(this).attr('likable_id');
        var target = $(this).attr('target');

        $.ajax({
          type:'post',
          url:'/like',
          data:{likable_type:likable_type,likable_id:likable_id,target:target},
          success:function(data){
            $('#'+target).html(data);
          }
        });
    });

    //Set up unliking
    $('body').on('click','.unlike',function(){
        var likable_type = $(this).attr('likable_type');
        var likable_id = $(this).attr('likable_id');
        var target = $(this).attr('target');

        $.ajax({
          type:'post',
          url:'/unlike',
          data:{likable_type:likable_type,likable_id:likable_id,target:target},
          success:function(data){
            $('#'+target).html(data);
          }
        });
    });



  });
