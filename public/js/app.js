//active navbar behavior
$(document).ready(function(){
  var current = location.pathname;
  $('.nav-tabs li a').each(function(){
      $('.nav-item').find('.active').removeClass('active');
      var $this = $(this);
      if($this.attr('href') == current){
          $this.parent().addClass('active');
      }
      if((current == "/orders") || ( current =="/shop") || (current == "/reports")){
          $('.management').addClass('active');
      }
  })
})