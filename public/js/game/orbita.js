////////////////////////////////// montar telescópio
var game = new Phaser.Game(1000, 600, Phaser.AUTO, 'game', { preload: preload, create: create, update: update, render: render}, '#game', null, false);
var voltas = 6;
var stop_2 = false;
var stop_1 = false;


function preload() {
    game.load.image('orbita', '/games/orbita.png');
    game.load.image('earth', '/games/earth_small.png');
}

function create(){
  game.physics.startSystem(Phaser.Physics.ARCADE);
  orbita = game.add.sprite(game.world.centerX - 320, game.world.centerY - 270, 'orbita');
  orbita.scale.x = 0.7;
  orbita.scale.y = 0.7;

  create_earth();

  var bmd = game.add.bitmapData(30, 30);

  bmd.ctx.beginPath();
  bmd.ctx.rect(0, 0, 30, 30);
  bmd.ctx.fillStyle = '#ff0000';
//  bmd.ctx.fill();

  var stop = game.add.bitmapData(50, 50);

  stop.ctx.beginPath();
  stop.ctx.rect(0, 0, 50, 50);
  stop.ctx.fillStyle = '#000000';
//  stop.ctx.fill();

  stop2 = game.add.group();
  stop2.enableBody = true;
  stop2.physicsBodyType = Phaser.Physics.ARCADE;

  stop1 = game.add.group();
  stop1.enableBody = true;
  stop1.physicsBodyType = Phaser.Physics.ARCADE;

  stop1.create(737, 490, stop);
  stop2.create(242, 140, stop);

  paths = game.add.group();
  paths.enableBody = true;
  paths.physicsBodyType = Phaser.Physics.ARCADE;

  var positions = [
    [702, 187],
    [677, 160],
    [652, 142],
    [636, 128],
    [609, 116],
    [589, 106],
    [564, 92],
    [538, 77],
    [520, 69],
    [496, 59],
    [461, 52],
    [431, 43],
    [392, 39],
    [363, 43],
    [330, 42],
    [294, 45],
    [269, 51],
    [235, 67],
    [205, 81],
    [182, 100],
    [163, 130],
    [149, 164],
    [135, 220],
    [137, 190],
    [137, 244],
    [141, 274],
    [159, 317],
    [158, 298],
    [178, 349],
    [199, 378],
    [222, 407],
    [241, 429],
    [258, 449],
    [281, 471],
    [302, 483],
    [326, 504],
    [355, 522],
    [395, 537],
    [382, 535],
    [421, 543],
    [450, 563],
    [478, 569],
    [521, 587],
    [490, 572],
    [535, 585],
    [558, 590],
    [595, 591],
    [623, 591],
    [647, 587],
    [686, 585],
    [666, 587],
    [714, 576],
    [742, 568],
    [769, 554],
    [792, 535],
    [812, 519],
    [822, 498],
    [825, 460],
    [832, 430],
    [829, 412],
    [829, 389],
    [817, 352],
    [808, 318],
    [734, 211],
    [760, 225],
    [790, 250],
    [809, 278],
    [797, 492],
    [763, 529],
    [719, 543],
    [807, 435],
    [805, 413],
    [787, 321],
    [779, 280],

    //////////
    [679, 327],
    [584, 228],
    [565, 213],
    [542, 204],
    [519, 193],
    [490, 177],
    [462, 163],
    [431, 157],
    [399, 152],
    [375, 150],
    [343, 147],
    [311, 152],
    [295, 187],
    [273, 218],
    [278, 246],
    [292, 280],
    [308, 314],
    [336, 345],
    [369, 369],
    [405, 393],
    [441, 408],
    [464, 448],
    [502, 457],
    [542, 466],
    [585, 463],
    [629, 462],
    [668, 459],
    [694, 435],
    [705, 404],
    [704, 367],
  ];

  for (var position in positions) {
    paths.create(positions[position][0], positions[position][1], bmd);
  }

}

function update() {
  game.physics.arcade.overlap(earth, paths, handleDie, null, this);
  game.physics.arcade.overlap(earth, stop1, handleStop1, null, this);
  game.physics.arcade.overlap(earth, stop2, handleStop2, null, this);

  if(stop_1 && stop_2){
      stop_1 = false;
      stop_2 = false;
      voltas--;
  }

    if(voltas == 0){
        handleFinish();
    }
}

function handleDie(){
  $(document).find('.cientist-box').show();
  $(document).find('.controls').show();
  text_cientist('Tome cuidado com a órbita, você tem que fazer ela perfeita!');
  earth.kill();
  voltas = 6;
  $(document).find('.again').show();
}

function create_earth(){
  earth = game.add.sprite(685, 244, 'earth');
  game.physics.enable(earth, Phaser.Physics.ARCADE);
  earth.body.setCircle(16);
  earth.body.collideWorldBounds = true;

  earth.inputEnabled = true;
  earth.input.enableDrag();

}

function handleStop1(){
    if(!stop_1){
        stop_1 = true;
    }
}

function handleStop2(){
    if(!stop_2){
        stop_2 = true;
    }
}

function handleFinish(){
    earth.kill();
    $(document).find('.cientist-box').show();
    $(document).find('.controls').show();
    text_cientist('Parabéns você conseguiu terminar!');
    $(document).find('.again').show();
    $(document).find('.again').html('<i class="uk-icon-exclamation"></i> COMPLETAR MISSÃO').removeClass('uk-button-success').addClass('uk-button-danger').attr('onclick', 'complete_quest("capitulo_kepler_primeira_missao");');

}

function render(){
  game.debug.text("Voltas restantes: " + Math.round(voltas / 2), 100, 30);
}
