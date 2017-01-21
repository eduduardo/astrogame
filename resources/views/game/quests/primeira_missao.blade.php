@extends('game.general.general')
@section('title')
{{ trans('chapters.welcome.title') }}  | {{ trans('project.title') }}
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script src="https://www.youtube.com/iframe_api"></script>
<script>
var player;
var quest = 'primeira_missao';

var videos = {
		big_bang: 'hDcWqidxvz4',
		star_intro: 'bMUYkU6okcg',
		milk_way: 'v92KL4X9tyg',
		solar_system: 'ZPfHiPS4tUg',
		earth: 'MuNvLEiEi2E',
};

window.falas = [
		'Você está se perguntando o que foi essa grande explosão? Pois bem, ela foi a origem de tudo o que conhecemos hoje, O Big Bang ocorreu por volta de 13 bilhões de anos atrás e deu origem a todo o universo. O que o provocou é, até hoje, um grande mistério',
		'Muito tempo depois do Big Bang, as primeiras estrelas começaram a se formar',
		'O agrupamento dessas estrelas deu origem às primeiras galáxias do universo, essa é a Via Lactea, a nossa Galáxia-Mãe, vamos dar uma olhada mais de perto.',
		'Esse é o Sistema Solar, ele possui 7 planetas que orbitam a enorme estrela que chamamos de Sol, entre esses planetas, está a nossa Terra, o único planeta conhecido com existência de vida.',
		'É aqui que a sua jornada se inicia, aspirante. Esperamos que você consiga aprender um pouco mais sobre o universo com essa aventura.',
		'Boa sorte e divirta-se!',
];

function youtube_video(videoId, name){
	player = new YT.Player('video_' + name, {
			height: "100%",
			width: "100%",
			videoId: videoId,
			playerVars: { 'autoplay': 0, 'controls': 0, 'showinfo': 0 },
			events: {
					onStateChange: function(event){
							if(event.data == YT.PlayerState.ENDED){
									$(document).find('#video_' + name).remove();
									$(document).find('.cientist-box').show();
									window.fala++;
					        window.dispatchEvent(window.fala_event);
									if(name == 'earth'){
											complete_quest(quest);
									}
							}
					},
					onReady: function(event){
						event.target.mute();
					}
			}
	});
}

function onYouTubeIframeAPIReady() {
	for (var key in videos) {
			youtube_video(videos[key], key);
	}
}
</script>
@stop

@section('content')
	<div class="video-container">
			<div id="video_earth"></div>
			<div id="video_solar_system"></div>
			<div id="video_milk_way"></div>
			<div id="video_star_intro"></div>
			<div id="video_big_bang"></div>
	</div>

  <div class="uk-container uk-container-center game-section">
		<div class="cientist-box" style="display:none">
        <div class="cientist-message">
            <span class="bubble cientist-text"></span>
        </div>
        <img src="{{ URL('/img/char/galileu-01.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
    </div>
	</div>
</div>
@stop
