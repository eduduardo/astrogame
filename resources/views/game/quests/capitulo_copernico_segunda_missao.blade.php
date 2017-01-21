@extends('game.general.general')
@section('title')
O Pai da Astronomia
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
play_music('background3');
var quest = 'capitulo_copernico_segunda_missao';
var complete_quest_on_quiz_completed = false;

window.falas = [
'Há muito tempo, acreditava-se que a Terra era o centro de todo o Universo...',
'Esse pensamento ficou conhecido como A Teoria do Geocentrismo.',
'Por volta de 1530, propus que a Terra e os outros planetas, na verdade, giram em torno do nosso Sol em rotas circulares, em um movimento chamado de Translação. Essa teoria ficou conhecida como a Teoria do Heliocentrismo...',
'Também afirmei que a Terra gira em torno de si mesma, em um movimento chamado de Rotação, que demora 24 horas para ser concluído.',
'O Heliocentrismo NÃO afirma que o Sol é o centro do universo, ele somente diz que o Sol está proximo ao centro do universo.',
'A Terra demora 365 dias para completar uma volta completa em torno do Sol, ou seja, 1 ano.',
'Para os outros planetas, esse período pode variar de acordo com a sua distância do Sol. Quanto mais distante um planeta estiver, maior será o período para que a volta seja completada.',
'O heliocentrismo foi muito importante para abrir os olhos da humanidade, e mostrar que não somos especiais nesse grande universo...',
'Mas sim somente mais um pequeno planeta em meio a milhares de outros',
'Agora vamos testar seus conhecimentos sobre o assunto!',
];

window.dispatchEvent(window.fala_event); // inicia a fala

window.addEventListener('troca_fala', function(){
		if(window.fala == 11){
				$(document).find('.quizz').show();
		}
});

window.addEventListener('quizOver', function(){
		text_cientist('Muito bem, aspirante! Agora que você já sabe um pouco mais sobre o Heliocentrismo e como ele foi importante para a astronomia, está pronto para seguir em frente! Foi um prazer ter compartilhado meus conhecimentos com você. Adeus, Observador! ');
		$(document).find('.prev-fala').hide();
		$(document).find('.next-fala').html('<i class="uk-icon-exclamation"></i> COMPLETAR MISSÃO').removeClass('uk-button-success').addClass('uk-button-danger').attr('onclick', 'complete_quest("'+ quest +'");');

});

var questions = [{
    question: "Qual o nome da teoria que antecedeu a teoria de Copérnico?",
    choices: ["Teocentrismo", "Geocentrismo", "Antropocentrismo", "Heliocentrismo"],
    correctAnswer: 1
}, {
    question: "Como se chama o movimento que a Terra realiza em torno do Sol?",
    choices: ["Rotação", "Transação", "Translação", "Circular"],
    correctAnswer: 2
}, {
    question: "O que afirmava a Teoria do Heliocentrismo?",
    choices: ["A Terra é o centro do Universo", "O Sol é o centro do universo", "O Universo não possui centro", "A Terra gira em torno do Sol,  o qual está proximo ao centro do universo"],
    correctAnswer: 3
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
     <img src="{{ URL('/img/char/copernico.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
  </div></div>
  </div>
@stop
