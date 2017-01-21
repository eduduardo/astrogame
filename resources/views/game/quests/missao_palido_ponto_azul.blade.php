@extends('game.general.general')
@section('title')
Pequeno pálido ponto azul
@stop

@section('javascript')
<script>
stop_music();
var quest = 'missao_palido_ponto_azul';
var videoId = 'brLOlmnLn8c';
</script>
{!! Minify::javascript(['/js/game/simples-youtube.js'])->withFullURL() !!}
@stop

@section('content')
<div class="video-container">
    <div id="video"></div>
</div>
<script src="https://www.youtube.com/iframe_api"></script>
@stop
