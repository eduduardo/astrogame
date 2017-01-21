@extends('game.general.general')
@section('title')
Em breve | {{ trans('project.title') }}
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
play_music('bossa_nova');
</script>
@endsection

@section('content')
  <div class="uk-container uk-container-center game-section">
      <div class="uk-grid">
          <div class="uk-width-1-2 uk-container-center uk-text-center">
              <h1 class="big-bang-text" style="color: #fff"><i class="uk-icon-clock-o"></i> Em Breve</h1>
          </div>
      </div>
  <div class="cientist-box">
      <div class="cientist-message">
          <span class="bubble cientist-text">Curta a bossa nova enquanto a missão não fica pronta!</span>
      </div>
      <img src="{{ URL('/img/char/carl-01.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="carl sagan cartoon">
  </div>
  </div>
@stop
