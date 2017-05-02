$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function(){
    $('.clickable').click(function(){
      window.location.href = $(this).attr('target');
    });
  });
