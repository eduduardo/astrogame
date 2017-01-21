@extends('game.general.general')
@section('title')
Um mundo novo
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
$(document).ready(function(){
window.falas = [
'Parece que estamos chegando ao final de nossa aventura, meu caro. Espero que tudo pelo que você passou no Astrogame tenha te ensinado uma coisa: Somos somente uma parte de algo muito, muito maior que nós.',
'Torço para que você tenha obtido novos conhecimentos a partir desse jogo e que tenha sentido algum tipo de interesse pela Astronomia, por menor que seja, e que também tenha aprendido uma lição de humildade, afinal, não somos nada em relação ao grande universo!',
'Enfim, obrigado por ter jogado o Astrogame! A equipe de desenvolvimento do jogo e todos nós, astrônomos que te auxiliaram nessa jornada, te desejamos uma boa jornada na longa estrada da vida, que seu caminho seja repleto de conhecimentos e alegrias. Adeus, Capitão!',
'Adeus e obrigado!',
];
window.dispatchEvent(window.fala_event); // inicia a fala

window.addEventListener('troca_fala', function(){
    if(window.fala == 3){
        complete_quest('capitulo_carl_sagan_quarta_missao');
    }
});

});
</script>
@stop

@section('content')
<div id="game"></div>
<div class="uk-container uk-container-center game-section">
  <div class="cientist-box">
      <div class="controls">
          <button class="prev-fala uk-button uk-button-danger"><i class="uk-icon-arrow-left"></i> Anterior</button>
          <button class="next-fala uk-button uk-button-success">Próximo <i class="uk-icon-arrow-right"></i></button>
      </div>
      <div class="cientist-message">
          <span class="bubble cientist-text"></span>
      </div>
      <img src="{{ URL('/img/char/carl-01.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
  </div>
</div>
@stop
