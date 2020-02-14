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
});