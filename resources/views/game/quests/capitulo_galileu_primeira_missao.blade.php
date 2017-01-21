@extends('game.general.general')
@section('title')
Meu primeiro telescópio
@stop

@section('javascript')
{!! Minify::javascript(['/js/game/general.js'])->withFullURL() !!}
<script>
play_music('background2');
$(document).ready(function(){
window.items = {{ auth()->user()->count_has_items([1, 2, 3, 4])}};

window.falas = ['Ah, mais um viajante! Olá! Meu nome é Galileu Galilei, fui um astrônomo, físico e matemático Italiano, nascido em 1564...sim, já faz algum tempo haha!',
            'Fui o responsável por aperfeiçoar a luneta, e em 1610 observei montanhas e crateras na Lua, manchas no Sol e quatro satélites em volta de Júpiter.',
            'Fui um grande apoiador da teoria Heliocêntrica proposta por Copérnico, e com minhas observações, pude provar que tudo era verdade!',
            'Eu amava observar os céus noturnos em busca do desconhecido, foi assim que observei as luas de Júpiter e várias manchas solares.',
            'Bem, se você quer se aventurar nos confins do espaço, terá que começar observando o céus, e é isso que vamos fazer agora!',
            'Muito bem, agora podemos começar a montar nosso telescópio. Vá até o menu LOJA para começar!'];

window.addEventListener('buy_item', function (e) {
    var item_id = e.detail;

    if(item_id == 1){
        window.items++;
    }

    if(item_id == 2){
        window.items++;
    }

    if(item_id == 3){
        window.items++;
    }

    if(item_id == 4){
        window.items++;
    }
});

window.addEventListener('troca_fala', function(){
    if(window.fala == 5){
        UIkit.modal("#shop").show();
    }
});

setInterval(function(){
    if(window.items == 4){
        text_cientist('Muito bem, você possui um telescópio e muita força de vontade, está tudo pronto para começarmos nossa observação! Vá ao menu MISSÕES.');
        complete_quest('capitulo_galileu_primeira_missao');
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
          <span class="bubble cientist-text">Ah, mais um viajante! Olá! Meu nome é Galileu Galilei, fui um astrônomo, físico e matemático Italiano, nascido em 1564...sim, já faz algum tempo haha!</span>
      </div>
      <img src="{{ URL('/img/char/galileu-01.png')}}" class="cientist uk-animation-hover uk-animation-shake" alt="">
  </div>
</div>
@stop
