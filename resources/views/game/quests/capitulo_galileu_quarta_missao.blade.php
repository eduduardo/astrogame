@extends('game.general.general')
@section('title')
Testando o conhecimento
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
play_music('background2');
var quest = 'capitulo_galileu_quarta_missao';
var complete_quest_on_quiz_completed = false;

window.falas = [
	'Agora vamos ver como se forma uma estrela e, logo em seguida, você passará por um pequeno teste. Boa sorte!',
	'As estrelas nascem a partir de grandes nuvens formadas por gases e poeira chamada nebulosas.',
	'Dentro da nebulosa, esses gases e poeira se agrupam por causa da gravidade, formando assim as estrelas.',
	'Parece estranho, mas quando olhamos para uma estrela, estamos vendo o seu passado.',
	'Quando observamos uma estrela, estamos vendo a luz que ela emitiu para o espaço, e essa luz demora para chegar até nós, mesmo sendo muito rápida.',
	'Se a estrela estiver bem longe, bem longe mesmo, ela pode até já não existir mais...',
	'As constelações são agrupamentos aparentes de estrelas em que os astrônomos da antiguidade imaginaram formar figuras de pessoas, animais ou objetos...',
	'São "aparentes" pois, na verdade, as estrelas estão muito distantes uma das outras, muitas estão tão distantes quanto a Terra e o nosso Sol...',
	'As constelações nos ajudam a separar o céu em porções menores, mas identificá-las é em geral muito difícil.',
	'Elas surgiram na antiguidade para ajudar a identificar as estações do ano. Por exemplo, a constelação do Escorpião é típica do inverno já que em junho ela é visível a noite toda',
	'Agora é hora do pequeno teste!',
];
window.dispatchEvent(window.fala_event); // inicia a fala

window.addEventListener('troca_fala', function(){
		if(window.fala == 10){
				$(document).find('.quizz').show();
		}
});

window.addEventListener('quizOver', function(){
		text_cientist('Muito bem, observador, você se mostrou capaz de passar para a próxima parte de sua jornada! Espero que você se divirta e adquira muitos conhecimentos! Uma mudança de título me parece ser justa também! Até mais, Aprendiz!');
		$(document).find('.prev-fala').hide();
		$(document).find('.next-fala').html('<i class="uk-icon-exclamation"></i> COMPLETAR MISSÃO').removeClass('uk-button-success').addClass('uk-button-danger').attr('onclick', 'complete_quest("'+ quest +'");');

});


var questions = [{
    question: "Do que são formadas as estrelas?",
    choices: ["Força e Gravidade", "Oxigênio e Gases", "Gases e poeira", "Nuvens"],
    correctAnswer: 2
}, {
    question: "Onde as estrelas se formam?",
    choices: ["nas Galáxias", "em Nebulosas", "no Universo", "em berços Estelares"],
    correctAnswer: 3
}, {
    question: "Porque podemos dizer que, quando olhamos uma estrela, estamos enxergando o seu passado?",
    choices: ["Pois, na verdade, as estrelas não existem", "Pois todas as estrelas já morreram", "Pois o tempo é diferente no espaço", "Por causa da velocidade da luz"],
    correctAnswer: 3
}, {
    question: "Por que as contelações são 'aparentes'?",
    choices: ["Pois as estrelas estão muito longe uma das outras", "Pois o seu formato só se parece com figuras", "Pois muitas dessas estrelas já morreram", "Pois as estrelas mudam de lugar"],
    correctAnswer: 0
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
     <img src="{{ URL('/img/char/galileu-01.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
  </div>
	</div>
  </div>
@stop
