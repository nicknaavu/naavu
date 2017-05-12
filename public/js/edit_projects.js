$(document).ready(function(){

  $('.leave_project').click(function(){
    project_id = $(this).attr('project_id');

    $.ajax({
      type:"POST",
      url:"/leave_project",
      data:{project_id:project_id},
      success:function(data){
        $('#project_'+project_id).remove();
      }
    });
  });
});
