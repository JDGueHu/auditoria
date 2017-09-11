$(document).ready(function(){
  
  // Jquery para multinivel drop down
  $('.dropdown a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });

});

