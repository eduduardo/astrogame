@extends('game.general.general')
@section('title')
Mãos a obra
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js', '/js/game/telescopio.js'])->withFullURL() !!}
<script>
play_music('background3');
</script>
@endsection

@section('content')
<div id="game"></div>
<div class="uk-container uk-container-center game-section">
   <div class="cientist-box">
   <div class="cientist-message">
       <span class="bubble cientist-text">Muito bem, agora podemos começar a montar nosso telescópio!</span>
   </div>
   <div class="controls" style="display: none">
     <button class="uk-button uk-button-danger" onclick="complete_quest('capitulo_galileu_segunda_missao')"><i class="uk-icon-exclamation"></i> Completar Missão</button>
   </div>
   <img src="{{ URL('/img/char/galileu-01.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
 </div>
</div>
@endsection
