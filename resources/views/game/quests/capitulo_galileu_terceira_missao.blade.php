@extends('game.general.general')
@section('title')
A Arte da Observação
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
UIkit.modal("#observatory").show();
UIkit.notify("<i class='uk-icon-exclamation'></i> Observe o céu por 2 minutos", {status: 'warning', pos:'top-right'});

setTimeout(function(){
  $(document).find('.cientist-box').show();
  $(document).find('.controls').show();
  text_cientist('Espero que tenha gostado!');

}, 120000);

</script>
@endsection

@section('content')
<div id="game"></div>
<div class="uk-container uk-container-center game-section">
   <div class="cientist-box">
   <div class="cientist-message">
       <span class="bubble cientist-text">Observe o céu por 2 minutos</span>
   </div>
   <div class="controls" style="display: none">
     <button class="uk-button uk-button-danger" onclick="complete_quest('capitulo_galileu_terceira_missao')"><i class="uk-icon-exclamation"></i> Completar Missão</button>
   </div>
   <img src="{{ URL('/img/char/galileu-01.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
 </div>
</div>
@endsection
