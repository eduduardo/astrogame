@extends('game.general.general')
@section('title')
Mais peças para a espaçonave
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
play_music('background2');
$(document).ready(function(){
window.items = {{ auth()->user()->count_has_items([5, 6, 7, 8, 9])}};

window.falas = [
'Olá peregrino, estive esperando por você! Vejo que você conseguiu chegar ao posto de capitão, ótimo! Irei precisar das suas habilidades!',
'Meu nome é Carl Sagan, fui um astrônomo e biólogo americano e me dediquei muito à minha paixão: A busca por habitantes de outros planetas.',
'Eu trabalhei com a NASA para lançar ao espaço uma espaçonave que contém mensagens que, talvez, possa ser entendida por possíveis seres inteligentes de outros planetas. Essa espaçonave ficou recebeu o nome de Voyager.',
'Infelizmente, nós perdemos contato com essa espaçonave, ela deve estar vagando por aí. Sendo assim, vamos precisar de alguém experiente para sair em busca da Voyager, e quem melhor que você, Capitão?',
'Vamos precisar construir uma nova espaçonave!',
];


window.addEventListener('buy_item', function (e) {
    var item_id = e.detail;

    if(item_id == 5){
        window.items++;
    }

    if(item_id == 6){
        window.items++;
    }

    if(item_id == 7){
        window.items++;
    }

    if(item_id == 8){
        window.items++;
    }

    if(item_id == 9){
        window.items++;
    }
});

window.addEventListener('troca_fala', function(){
    if(window.fala == 4){
        UIkit.modal("#shop").show();
    }
});

setInterval(function(){
    if(window.items == 5){
        text_cientist('Certo, agora é só montar essa belezura!');
        complete_quest('capitulo_carl_sagan_primeira_missao');
    }
}, 3000);

});
</script>
@stop

@section('content')
<div id="game"></div>
<div class="uk-container uk-container-center game-section">
  <div class="cientist-box">
      <div class="controls">
        <button class="prev-fala uk-button uk-button-danger"><i class="uk-icon-arrow-left"></i> Anterior</button>
        <button class="next-fala uk-button uk-button-success">Próximo <i class="uk-icon-arrow-right"></i></button>
      </div>
      <div class="cientist-message">
          <span class="bubble cientist-text">Olá peregrino, estive esperando por você! Vejo que você conseguiu chegar ao posto de capitão, ótimo! Irei precisar das suas habilidades!</span>
      </div>
      <img src="{{ URL('/img/char/carl.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
  </div>
</div>
@stop
