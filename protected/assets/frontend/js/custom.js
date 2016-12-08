$(document).ready(function() {

$('.read-more-hide').hide();
 
  
  $('.read-more span').click(function(){
       $('.hide-content').toggle('slow', function() {
       $('.read-more').hide();
       $('.read-more-hide').show();
    });
  });
  $('.read-more-hide').click(function(){
       $('.hide-content').toggle('slow', function() {
       $('.read-more').show();
       $('.read-more-hide').hide();
    });
  });  

  
   $('.read-more-hide-en').hide();
 
  
  $('.read-more-en span').click(function(){
       $('.hide-content-en').toggle('slow', function() {
       $('.read-more-en').hide();
       $('.read-more-hide-en').show();
    });
  });
  $('.read-more-hide-en').click(function(){
       $('.hide-content-en').toggle('slow', function() {
       $('.read-more-en').show();
       $('.read-more-hide-en').hide();
    });
  });  

 
  
     $('.read-more-hide-ea').hide();
 
  
  $('.read-more-ea span').click(function(){
       $('.hide-content-ea').toggle('slow', function() {
       $('.read-more-ea').hide();
       $('.read-more-hide-ea').show();
    });
  });
  $('.read-more-hide-ea').click(function(){
       $('.hide-content-ea').toggle('slow', function() {
       $('.read-more-ea').show();
       $('.read-more-hide-ea').hide();
    });
  });  

  
  
     $('.read-more-hide-sh').hide();
 
  
  $('.read-more-sh span').click(function(){
       $('.hide-content-sh').toggle('slow', function() {
       $('.read-more-sh').hide();
       $('.read-more-hide-sh').show();
    });
  });
  $('.read-more-hide-sh').click(function(){
       $('.hide-content-sh').toggle('slow', function() {
       $('.read-more-sh').show();
       $('.read-more-hide-sh').hide();
    });
  });  
  
  
  $('.read-more-hide-temparch').hide();
 
  
  $('.read-more-temparch span').click(function(){
       $('.hide-content-temparch').toggle('slow', function() {
       $('.read-more-temparch').hide();
       $('.read-more-hide-temparch').show();
    });
  });
  $('.read-more-hide-temparch').click(function(){
       $('.hide-content-temparch').toggle('slow', function() {
       $('.read-more-temparch').show();
       $('.read-more-hide-temparch').hide();
    });
  }); 
  
  
    $('.read-more-hide-templan').hide();
 
  
  $('.read-more-templan span').click(function(){
       $('.hide-content-templan').toggle('slow', function() {
       $('.read-more-templan').hide();
       $('.read-more-hide-templan').show();
    });
  });
  $('.read-more-hide-templan').click(function(){
       $('.hide-content-templan').toggle('slow', function() {
       $('.read-more-templan').show();
       $('.read-more-hide-templan').hide();
    });
  });  

 
  
     $('.read-more-hide-ac').hide();
 
  
  $('.read-more-ac span').click(function(){
       $('.hide-content-ac').toggle('slow', function() {
       $('.read-more-ac').hide();
       $('.read-more-hide-ac').show();
    });
  });
  $('.read-more-hide-ac').click(function(){
       $('.hide-content-ac').toggle('slow', function() {
       $('.read-more-ac').show();
       $('.read-more-hide-ac').hide();
    });
  });  

 $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
 

});
 