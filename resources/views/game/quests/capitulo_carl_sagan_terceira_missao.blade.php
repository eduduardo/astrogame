@extends('game.general.general')
@section('title') Para o alto e avante! @stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js', '/js/game/carl_sagan_quest.js'])->withFullURL() !!}
<script>
play_music('quest_carl');
</script>
@endsection

@section('content')
<div id="game"></div>
  <div class="uk-container uk-container-center game-section">
    <div class="cientist-box">
      <div class="cientist-message">
          <span class="bubble cientist-text">Ok, Capitão! Estamos prontos para partir! Tenha cuidado e boa sorte!</span>
      </div>
      <div class="controls" style="display: none">
        <button class="uk-button uk-button-danger" onclick="complete_quest('capitulo_carl_sagan_terceira_missao')"><i class="uk-icon-exclamation"></i> Completar Missão</button>
      </div>
      <img src="{{ asset('/img/char/carl-01.png') }}" class="cientist uk-animation-hover uk-animation-shake" alt="carl sagan cartoon">
      </div>
  </div>
@stop
