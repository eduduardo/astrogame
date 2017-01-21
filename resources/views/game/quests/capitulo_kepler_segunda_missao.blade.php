@extends('game.general.general')
@section('title')
As três leis fundamentais
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
play_music('background3');
var quest = 'capitulo_kepler_segunda_missao';
var complete_quest_on_quiz_completed = false;

window.falas = [
'As três leis feitas por mim são responsáveis por reger o movimento planetário.',
'Não vamos nos aprofundar demais na segunda e na terceira lei, pois envolvem alguns cálculos e são difíceis de se entender, porém, vamos dar uma olhada rápida nelas!',
'A primeira lei, como já foi dito, é a Lei das órbitas, que afirma que os planetas descrevem órbitas redondas ao redor do Sol.',
'A segunda lei é a Lei das Áreas.',
'E, por fim, a terceira lei é a Lei dos Períodos.',
'Agora vamos fazer um pequeno teste para ver se você está pronto para seguir com sua viagem.',
];

window.dispatchEvent(window.fala_event); // inicia a fala

window.addEventListener('troca_fala', function(){
		if(window.fala == 5){
				$(document).find('.quizz').show();
		}
});

window.addEventListener('quizOver', function(){
		text_cientist('Muito bem, Aprendiz! Você foi capaz de passar no teste, e é com prazer que digo que você está pronto para continuar sua aventura. Algo me diz que você irá muito longe no espaço dessa vez, uma mudança de título seria apropriada, você não acha... Astronauta?');
		$(document).find('.prev-fala').hide();
		$(document).find('.next-fala').html('<i class="uk-icon-exclamation"></i> COMPLETAR MISSÃO').removeClass('uk-button-success').addClass('uk-button-danger').attr('onclick', 'complete_quest("'+ quest +'");');

});

var questions = [{
    question: "O que regem as Leis de Kepler?",
    choices: ["O movimento da Terra", "O movimento do Sol", "O movimento Planetário", "O movimento Quartenário"],
    correctAnswer: 2
}, {
    question: "Quais as três leis de Kepler?",
    choices: ["Leis das Órbitas, da Gravidade e do Tempo", "Leis das Órbitas, das Áreas e dos Períodos", "Lei das Áreas, dos Circulos e dos Trapézios", "Lei das Órbitas, do Espaço e da Expansão "],
    correctAnswer: 1
}, {
    question: "O que afirma a Lei das Orbitas?",
    choices: ["Os planetas percorrem órbitas circulares", "Os planetas não percorrem órbitas", "Os planetas giram em torno de si mesmos", "Os planetas percorrem órbitas elipticas"],
    correctAnswer: 3
}, {
    question: "Qual é a segunda Lei de Kepler?",
    choices: ["Lei dos Períodos", "Lei das Áreas", "Lei das Elipses", "Lei dos Períodos"],
    correctAnswer: 1
}];
</script>
{!! Minify::javascript(['/js/game/quizz.js'])->withFullURL() !!}
@stop

@section('content')
	<div class="uk-container uk-container-center game-section">
     <div class="uk-grid">
        <div class="uk-width-1-2 uk-container-center uk-panel uk-panel-box quizz" style="display: none">
           <h3 class="uk-panel-title"></h3>
           <div class="quizContainer">
              <h1 class="question"></h1>
              <ul class="choiceList uk-list-line"></ul>
              <div class="uk-alert uk-alert-danger quizMessage" style="display:none" data-uk-alert>
                 <a href="#" class="uk-alert-close uk-close"></a>
                 <p class="message">Por favor, selecione uma resposta</p>
              </div>
              <div class="result"></div>
              <div class="uk-button uk-button-success nextButton uk-align-right">Próxima pergunta <i class="uk-icon-arrow-circle-right"></i></div>
           </div>

        </div>
     </div>
		         <div class="cientist-box">
     <div class="cientist-message">
         <span class="bubble cientist-text"></span>
     </div>
     <div class="controls">
       <button class="prev-fala uk-button uk-button-danger"><i class="uk-icon-arrow-left"></i> Anterior</button>
       <button class="next-fala uk-button uk-button-success">Próximo <i class="uk-icon-arrow-right"></i></button>
     </div>
     <img src="{{ URL('/img/char/kepler.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
  </div>
  </div>
  </div>
@stop
