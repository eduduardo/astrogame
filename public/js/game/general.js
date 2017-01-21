function text_cientist(message) {
    $(".cientist").show();
    $(".cientist-message").hide();
    $(".cientist-text").html(message);
    $(".cientist-message").show();
}

//////////////////////////////////////////////////////////
// falas
// ///////////////////////////////////////////////////////
window.fala = 0;
window.falas = [];
window.fala_event = new Event('troca_fala');
window.addEventListener('troca_fala', function(){
    text_cientist(window.falas[window.fala]);

});
$(document).ready(function(){
  $(".next-fala").click(function(){
      if(window.fala <= window.falas.length){
        window.fala++;
        window.dispatchEvent(window.fala_event);
      }
  });

  $(".prev-fala").click(function(){
      if(window.fala > 0){
        window.dispatchEvent(window.fala_event);
        window.fala--;
      }
  });

  $('.cientist-message').click(function(){
      $('.cientist-box').hide('slow');
  });
});
