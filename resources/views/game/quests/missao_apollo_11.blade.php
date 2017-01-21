@extends('game.general.general')
@section('title')
Apollo 11
@stop

@section('javascript')
<script>
play_music('background3');
var quest = 'missao_apollo_11';
var videoId = 'GnMRJ5F8swo';
</script>
{!! Minify::javascript(['/js/game/simples-youtube.js'])->withFullURL() !!}
@stop

@section('content')
<div class="video-container">
    <div id="video"></div>
</div>
<script src="https://www.youtube.com/iframe_api"></script>
@stop
