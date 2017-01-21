@extends('game.general.general')
@section('title')
As órbitas são elípticas, não redondas!
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js', '/js/game/orbita.js'])->withFullURL() !!}
<script>
play_music('background2');
$(document).ready(function(){

window.falas = [
'Olá, aprendiz! Eu sou Johannes Kepler, fui um astrônomo alemão, além de físico e matemático.',
'Sou conhecido por ter formulado as três leis fundamentais responsáveis por reger o movimento planetário, mais conhecidas como LEIS DE KEPLER.',
'Nesse momento, vamos aprender um pouco mais sobre essas leis.',
'Com a teoria do Heliocentrismo, foi provado que a Terra e os outros corpos do nosso sistema solar giram em torno do nosso Sol.',
'Porém, foi proposto que as órbitas que os planetas descreviam eram circulares.',
'Na primeira lei de Kepler, eu provei que isso não era verdade.',
'Os planetas, na verdade, giram em órbitas elípticas ao redor do Sol, sendo que o Sol ocupa um dos focos da Elipse.',
'Faça agora 3 voltas completas da órbita da terra ao redor do sol, boa sorte!',
];
window.dispatchEvent(window.fala_event); // inicia a fala

window.addEventListener('troca_fala', function(){
    if(window.fala == 7){
        $("#game").show();
        $(document).find('.prev-fala').hide();
        $(document).find('.next-fala').hide();
    }
});

});
</script>
@stop

@section('content')
  <div id="game" style="display:none"></div>
  <div class="uk-container uk-container-center game-section">
        <div class="cientist-box">

        <div class="controls">
          <button class="prev-fala uk-button uk-button-danger"><i class="uk-icon-arrow-left"></i> Anterior</button>
          <button class="next-fala uk-button uk-button-success">Próximo <i class="uk-icon-arrow-right"></i></button>
          <button class="again uk-button uk-button-danger" style="display:none" onclick="create_earth()">TENTAR DE NOVO <i class="uk-icon-exclamation"></i></button>
        </div>
        <div class="cientist-message">
            <span class="bubble cientist-text"></span>
        </div>
        <img src="{{ URL('/img/char/kepler.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
    </div>
        </div>
</div>
@stop
