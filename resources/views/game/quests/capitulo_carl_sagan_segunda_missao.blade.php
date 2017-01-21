@extends('game.general.general')
@section('title')
É tipo um quebra-cabeça!
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js', '/js/game/assembler.js'])->withFullURL() !!}
<script>
play_music('background3');
</script>
@endsection

@section('content')
<div id="game"></div>
<div class="uk-container uk-container-center game-section">
   <div class="cientist-box">
   <div class="cientist-message">
       <span class="bubble cientist-text">Certo, agora é só montar essa belezura!</span>
   </div>
   <div class="controls" style="display: none">
     <button class="uk-button uk-button-danger" onclick="complete_quest('capitulo_carl_sagan_segunda_missao')"><i class="uk-icon-exclamation"></i> Completar Missão</button>
   </div>
   <img src="{{ URL('/img/char/carl-01.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
 </div>
</div>
@endsection
