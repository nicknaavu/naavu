$(document).ready(function(){

  //Bind invite to rep button
  $('body').on('click','.invite_to_rep',function(){
    user_id = $(this).attr('user_id');
    project_id = $(this).attr('project_id');

    $.ajax({
      type:"POST",
      url:"/invite_to_rep",
      data:{user_id:user_id,project_id:project_id},
      success:function(){location.reload;}
    });
  });

  //Bind remove from project button
  $('body').on('click','.remove_from_project',function(){
    user_id = $(this).attr('user_id');
    project_id = $(this).attr('project_id');

    $.ajax({
      type:"POST",
      url:"/remove_from_project",
      data:{user_id:user_id,project_id:project_id},
      success:function(data){
        location.reload;
      }
    });
  });


});
