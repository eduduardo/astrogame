@extends('game.general.general')
@section('title')
Video Projeto Cosmos
@stop

@section('javascript')
<script>
stop_music();
var quest = 'missao_projeto_cosmos';
var videoId = 'zBx8e6eGfV4';
</script>
{!! Minify::javascript(['/js/game/simples-youtube.js'])->withFullURL() !!}
@stop

@section('content')
<div class="video-container">
    <div id="video"></div>
</div>
<script src="https://www.youtube.com/iframe_api"></script>
@stop
