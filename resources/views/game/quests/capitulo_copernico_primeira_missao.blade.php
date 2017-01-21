@extends('game.general.general')
@section('title')
Capítulo I - O Sistema Solar
@stop

@section('javascript')
{!! Minify::javascript(['/construct/capitulo_copernico_primeira_missao/c2runtime.js'])->withFullURL() !!}
<script>
play_music('background3');
$(document).ready(function(){
		cr_createRuntime("c2canvas");
		background3.play();
});
</script>
@stop

@section('content')
<div id="c2canvasdiv">
		<canvas id="c2canvas" width="1280" height="720"></canvas>
</div>
@stop
