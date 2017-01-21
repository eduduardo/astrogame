@extends('game.general.general')
@section('title')
Hubble, O astrônomo, não o telescópio
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
play_music('background3');
var quest = 'capitulo_hubble_segunda_missao';
var complete_quest_on_quiz_completed = false;

$(document).ready(function(){
window.falas = [
'Agora eu gostaria de lhe explicar um pouco mais sobre a minha própria lei e sobre a teoria do universo em expansão, preste atenção!',
'Em minhas observações, vi que algumas galáxias emitiam luzes diferentes das outras, algumas com mais vermelhas, outras mais azuis. ',
'Descobri que isso acontecia porque as outras galáxias não estão paradas como pensávamos, elas estão se movimentando também!',
'Na verdade, todo o universo está se movendo, tudo está em constante expansão! Foi daí que veio a teoria do universo em expansão.',
'Pois bem, se tudo está se movimentando no universo, as outras galáxias podem estar se afastando ou se aproximando de nós.',
'Com isso, consegui criar uma relação entre as cores das galáxias e o tipo de movimentos que elas estão realizando.',
'Se a galáxia que está sendo observado está se aproximando de nós, sua luz se desloca para o azul.',
'E, se ela está se afastando de nós, ela se desloca para o vermelho.',
'Agora vamos testar de novo seu conhecimento...',
];
    window.dispatchEvent(window.fala_event); // inicia a fala

    window.addEventListener('troca_fala', function(){
        if(window.fala == 8){
            $(document).find('.quizz').show();
        }
    });

    window.addEventListener('quizOver', function(){
        text_cientist('É isso ai astronauta! Eu acho que você está realmente pronto para a última etapa de sua viagem, uma pessoa muito especial está te esperando e precisa de sua ajuda! Algo me diz que você terá que ser um pouco mais que um astronauta para isso. Boa sorte em sua aventura, Capitão!');
        $(document).find('.prev-fala').hide();
        $(document).find('.next-fala').html('<i class="uk-icon-exclamation"></i> COMPLETAR MISSÃO').removeClass('uk-button-success').addClass('uk-button-danger').attr('onclick', 'complete_quest("'+ quest +'");');

    });
});

var questions = [{
    question: "O universo está.....?",
    choices: ["...sempre parado", "...morrendo", "...sempre em movimento", "...flutuando"],
    correctAnswer: 2
}, {
    question: "Quais são as três classificações básicas de uma galáxia?",
    choices: ["Espirais, Redondas e Planas", "Verticais, Elípticas e Irregulares", "Espirais, Elípticas e Irregulares", "Circulares, Planas e Irregulares"],
    correctAnswer: 2
}, {
    question: "Qual tipo de galáxia não possui muitos gases e poeiras, assim, tendo poucas estrelas jovens?",
    choices: ["Espirais", "Elípticas", "Irregulares", "Todas as opções"],
    correctAnswer: 1
}, {
    question: "De acordo com a Lei de Hubble, se uma galáxia está se aproximando de nós, ela emite uma cor..",
    choices: ["Azul", "Roxa", "Vermelha", "Amarela"],
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
     <img src="{{ URL('/img/char/hubble.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
  </div>
    </div>
  </div>
@stop
