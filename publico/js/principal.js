$(document).ready(function(){
  // Opcion desplegables al posicionar el mouse sobre item usuario
  $('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').fadeIn(500);
  }, 
  function() {
    $(this).find('.dropdown-menu').fadeOut(500);
  });

  
});
