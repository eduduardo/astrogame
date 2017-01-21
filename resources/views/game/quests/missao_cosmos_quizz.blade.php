@extends('game.general.general')
@section('title')
Projeto Cosmos Quizz
@stop

@section('javascript')
<script>
play_music('background3');
var quest = 'missao_cosmos_quizz';
var complete_quest_on_quiz_completed = true;

var questions = [
	{
    question: "1.	Qual o nome da explosão que deu origem ao universo?",
    choices: ["Bang Bang", "Big Bang", "Boom Bang", "Big Boom"],
    correctAnswer: 1
	},
	{
    question: "2.	Qual destas alternativas possui uma temperatura na superfície de 5500 ° C?",
    choices: ["Supernova", "Buraco Negro", "Sol", "Meteoro"],
    correctAnswer: 2
	},
	{
    question: "3.	As erupções solares são _________ a nós.",
    choices: ["Toleráveis", "Agradáveis", "Fundamentais", "Nocivas"],
    correctAnswer: 3
	},
	{
    question: "4.	Qual o terceiro planeta a partir do Sol e o primeiro do sistema que possui um satélite natural?",
    choices: ["Terra", "Saturno", "Mercúrio", "Marte"],
    correctAnswer: 0
	},
	{
    question: "5.	Pontos luminosos em movimento que são gerados por corpos celestes que ultrapassam rapidamente a atmosfera e se desintegram rapidamente são:",
    choices: ["Supernovas", "Buracos Negros", "Estrelas", "Meteoro"],
    correctAnswer: 3
	},
	{
    question: "6.	Poderíamos desfrutar do show do COSMOS se não houvesse:",
    choices: ["Nuvens e chuva", "Nuvens e poluição", "Luminosidade e atmosfera", "Luminosidade e poluição"],
    correctAnswer: 3
	},
	{
    question: "7.	Quais constelações foram apresentadas no simulador?",
    choices: ["Cruzeiro do Sul e Órion", "Escorpião e Órion", "Escorpião e Ursa Maior", "Órion e Ursa Menor"],
    correctAnswer: 1
	},
	{
    question: "8.	Supernova é:",
    choices: ["A morte de uma estrela", "O nascimento de uma estrela", "A morte de um buraco negro", "A morte de um planeta"],
    correctAnswer: 0
	},
	{
    question: "9.	Buracos negros conseguem atrair tudo para si pois:",
	    choices: ["Possuem campos eletromagnéticos", "Possuem atmosfera", "Possuem forte gravidade", "Não possuem gravidade"],
    correctAnswer: 2
	},
	{
    question: "10.	O que são Exoplanetas?",
    choices: ["Planetas não habitáveis", "Planetas habitáveis", "Planetas em formação", "Planetas Mortos"],
    correctAnswer: 1
	},
];
</script>
{!! Minify::javascript(['/js/game/quizz.js'])->withFullURL() !!}
@stop

@section('content')
  <div class="uk-container uk-container-center game-section">
     <div class="uk-grid">
        <div class="uk-width-1-2 uk-container-center">
					<img src="{{ asset('img/logo-cosmos.png')}}" alt="logo cosmos" width="300" class="uk-align-center">
					<div class="uk-panel uk-panel-box">
           <h3 class="uk-panel-title"></h3>
           <div class="quizContainer">
              <h1 class="question"></h1>
              <ul class="choiceList uk-list-line"></ul>
              <div class="uk-alert quizMessage" style="display:none" data-uk-alert>
                 <a href="#" class="uk-alert-close uk-close"></a>
                 <p class="message">Por favor, selecione uma resposta</p>
              </div>
              <div class="result"></div>
              <div class="uk-button uk-button-success nextButton uk-align-right">Próxima pergunta <i class="uk-icon-arrow-circle-right"></i></div>
           </div>
        </div>
     </div>
  </div>
  </div>
@stop
