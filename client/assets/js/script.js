$(function(){
  /*$('.one form .btn').on('click',function(){ 
     $(this).parents('.one').animate({
          top : '-500px'
        },500);
    
      $(this).parents('.one').siblings('.two').
     animate({
          top : '0px'
        },500);
    return false;
  });*/

$('.two .close').on('click',function(){
  $(this).parent().hide();
  
  $(this).parent().siblings('.one').show();
  return false;
 });
/*Async call to API*/
  $(document).on('click','#async_push', function(e){
    let queue_val = $("#queue_val").val();
    if(queue_val.trim()!=''){
      $("#queue_val").val('');
      $.ajax({
        url:API_URL+"push",
        method:"post",
        data:{'queue_val':queue_val},
        dataType:'json',
        timeeout:30000,
        success: function(data){
          console.log(data)
          toastr.success(' "'+queue_val+'" queued on server with generated id '+data.id, 'Success')
        },
        error: function(error){
          console.log(error);
          toastr.error(error,"Something went wrong");
        }
      });
    }else{
      toastr.error('Enter text before pushing.','Fill the text')
    }
  });
  $(document).on('click','#async_pop', function(e){
      $.ajax({
        url:API_URL+"pop",
        method:"get",
        dataType:'json',
        timeeout:30000,
        success: function(data){
          // console.log(data)
          $("#pop_val").text(data.message);
          $("#pop_val").closest('section').show();
        },
        error: function(error){
          // console.log(error);
          toastr.error(error,"Something went wrong");
        }
      });
  });
});