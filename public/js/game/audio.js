///////////////////////////////////////////////////
// sons do jogo
///////////////////////////////////////////////////

if (!buzz.isMP3Supported()) {
    UIkit.notify('<i class=\"uk-icon-close\"> </i> Seu navegador não suporta audio MP3!', {status:'warning', pos: 'top-right'})
}

var coin_effect = new buzz.sound('/sounds/effects/inventory/coin.mp3');
var delete_effect = new buzz.sound('/sounds/effects/inventory/delete_item.mp3');
var quest_effect = new buzz.sound('/sounds/effects/quest_effect.mp3');
var map_effect = new buzz.sound('/sounds/effects/map_open.mp3');

var sound_effect = new buzz.group([
      coin_effect,
      delete_effect,
      quest_effect,
      map_effect
]);

// music background
var principal = new buzz.sound('/sounds/music/a_observar_a_vastidao2.mp3', {loop: true});
var background2 = new buzz.sound('/sounds/music/a_observar_a_vastidao3.mp3', {loop: true});
var background3 = new buzz.sound('/sounds/music/a_observar_a_vastidao1.mp3', {loop: true});
var quest_carl  = new buzz.sound('/sounds/music/ao_alto_avante.mp3', {loop: true});
var bossa_nova  = new buzz.sound('/sounds/music/elevator_music.mp3', {loop: true});

var background = new buzz.group([
      principal,
      background2,
      background3,
      quest_carl,
      bossa_nova
]);
principal.play();

function play_music(music){
    background.stop();
    eval(music + '.play();');
}

function stop_music(){
    background.stop();
}

$(".action-button").click(function(){
    map_effect.play();
});
