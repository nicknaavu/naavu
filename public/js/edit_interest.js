function add_interest_field()
  {
    $('#new_interests_template').clone().removeClass('hidden').attr('id','').appendTo('#new_interests');
  }

function delete_interest(id)
  {
    $.ajax({
      url:"/delete_interest",
      type:"POST",
      data:{id:id},
      success:function(data){
        $('#interest_'+id).remove();
      }
    }); //End ajax
  }
