function add_skill_field()
  {
    $('#new_skills_template').clone().removeClass('hidden').attr('id','').appendTo('#new_skills');
  }

function delete_skill(id)
  {
    $.ajax({
      url:"/delete_skill",
      type:"POST",
      data:{id:id},
      success:function(data){
        $('#skill_'+id).remove();
      }
    }); //End ajax
  }
