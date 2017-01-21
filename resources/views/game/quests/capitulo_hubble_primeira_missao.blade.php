@extends('game.general.general')
@section('title')
As Galáxias
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script src="https://www.youtube.com/iframe_api"></script>
<script>
var player;
var quest = 'primeira_missao';

var videos = {
		andromera: 'TijClV4uHIk',
		spiral: '_I8V3HNW8oQ',
		irregular: 'bb6TBowao0U',
};

window.falas = [
'Ah, veja só! É realmente um astronauta! Irei precisar de alguém como você para me ajudar em minhas missões!',
'Eu sou Edwin Hubble, fui um astrônomo americano e fiz muitas observações em relação as galáxias, inclusive fui o responsável por classificar várias delas.',
'Vamos dar uma olhada em como se classificam as galáxias e o porquê de elas possuírem esses formatos variados!',
'Existem muitas formas de se classificar uma galáxia, porém, vamos simplificar um pouco tudo isso para melhor entendimento!',
'Vamos falar sobre os três tipos básicos de galáxias descobertos até hoje: As Elípticas, as Espirais e as Irregulares!',
'As galáxias são formadas por milhões de estrelas, planetas e outros corpos, além de vários tipos de gases.',
'As galáxias Espirais podem ser identificadas pelo seu formato em espiral, elas possuem um núcleo em seu centro e braços espirais.',
'A Andromera é um bom exemplo de galáxia espiral.',
'A galáxia mais próxima de nós, Andrômeda, também é uma galáxia espiral.',
'Nas GALÁXIAS ESPIRAIS, existe uma grande quantidade de gases e poeira, possibilitando o nascimento de novas estrelas a todo momento.',
'Clique no video para continuar',
'As GALÁXIAS ELÍPTICAS apresentam uma forma esférica ou elipsoidal, parecendo grandes discos.',
'Essas galáxias têm pouco gás, poeira e também poucas estrelas jovens.',
'As galáxias elípticas variam muito de tamanho, desde super-gigantes até anãs. As maiores galáxias que existem são elípticas gigantes.',
'Clique no video para continuar',
'As GALÁXIAS IRREGULARES são aquelas que não possuem formatos definidos. ',
'A Grande e a Pequena Nuvens de Magalhães são exemplos de galáxias irregulares, repare como são uma verdadeira bagunça!',
'Dentro dessas galáxias existe uma grande atividade de formação de novas estrelas.',
'Clique no video para continuar',
'Acho que você está preparado agora para responder o quizz sobre galáxias',

];
window.dispatchEvent(window.fala_event);

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
                  $(document).find('.controls').show();

									window.fala++;
					        window.dispatchEvent(window.fala_event);
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

window.addEventListener('troca_fala', function(){
    if(window.fala == 10){
        $("#video_andromera").show();
        $(".controls").hide();
    }

    if(window.fala == 14){
        $("#video_spiral").show();
        $(".controls").hide();
    }

    if(window.fala == 18){
        $("#video_irregular").show();
        $(".controls").hide();
    }

    if(window.fala == 19){
        $(".controls").hide();
        complete_quest('capitulo_hubble_primeira_missao');
    }
});
</script>
@stop

@section('content')
	<div class="video-container">
  <div id="video_andromera" style="display:none"></div>
      <div id="video_spiral" style="display:none"></div>
      <div id="video_irregular" style="display:none"></div>
	</div>

  <div class="uk-container uk-container-center game-section">
		<div class="cientist-box">
        <div class="cientist-message">
            <span class="bubble cientist-text"></span>
        </div>
        <div class="controls">
          <button class="prev-fala uk-button uk-button-danger"><i class="uk-icon-arrow-left"></i> Anterior</button>
          <button class="next-fala uk-button uk-button-success">Próximo <i class="uk-icon-arrow-right"></i></button>
        </div>
        <img src="{{ URL('/img/char/hubble.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
    </div>
	</div>
</div>
@stop
