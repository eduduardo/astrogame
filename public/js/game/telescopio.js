var game = new Phaser.Game('100', '100', Phaser.AUTO, 'game', {
    preload: preload,
    create: create,
    update: update
}, '#game', null, false);
var tubo;
var buscador;
var tripe;
var checkTubo = false;
var checkBuscador = false;


function preload() {
    game.load.image('buscador', '/img/items/buscador.png');
    game.load.image('tripe', '/img/items/tripe.png');
    game.load.image('tubo', '/img/items/tubo-telescopico.png');
}

function create() {
    game.physics.startSystem(Phaser.Physics.ARCADE);

    tubo = game.add.sprite(0, 0, 'tubo');
    buscador = game.add.sprite(0, 0, 'buscador');
    tripe = game.add.sprite(game.world.centerX - 200, game.world.centerY - 200, 'tripe');

    buscador.scale.x = 0.4;
    buscador.scale.y = 0.4;

    tubo.inputEnabled = true;
    tubo.input.enableDrag();

    buscador.inputEnabled = true;
    buscador.input.enableDrag();

    game.physics.enable(buscador, Phaser.Physics.ARCADE);
    buscador.body.collideWorldBounds = true;
    game.physics.enable(tubo, Phaser.Physics.ARCADE);
    tubo.body.collideWorldBounds = true;
    game.physics.enable(tripe, Phaser.Physics.ARCADE);
}


function colisionBuscadorTripe(buscador, tripe) {
    if ((buscador.y >= tripe.y && buscador.y <= tripe.y + 30) &&
        (buscador.x >= tripe.x + 200)
    ) {
        buscador.inputEnabled = false;
        checkBuscador = true;
    }
}

function colisionTuboTripe(tubo, tripe) {
    if ((tubo.x > tripe.x + 30) &&
        (tubo.y <= tripe.y - 30)) {
        tubo.inputEnabled = false;
        checkTubo = true;
    }
}

function update() {
    game.physics.arcade.collide(buscador, tripe, null, colisionBuscadorTripe);
    game.physics.arcade.collide(tubo, tripe, null, colisionTuboTripe);

    if (checkBuscador && checkTubo) {
        handleFinal();
    }
}

function handleFinal() {
    $(document).find('.cientist-box').show();
    $(document).find('.controls').show();
    text_cientist('Muito bem, você possui um telescópio e muita força de vontade, está tudo pronto para começarmos nossa observação!');
}
