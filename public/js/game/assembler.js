var game = new Phaser.Game('100', 1000, Phaser.AUTO, 'game', {
    preload: preload,
    create: create,
    update: update,
    render: render
}, '#game', null, false);
var checkComandParachute = false;
var checkCommandSpin = false;
var checkSpinTank = false;
var checkTankEngine = false;

function preload() {

    game.load.image('parachute', '/img/items/parachute.png');
    game.load.image('anti_spin', '/img/items/anti_spin.png');
    game.load.image('command_module', '/img/items/command_module.png');
    game.load.image('fuel_tank', '/img/items/fuel_tank.png');
    game.load.image('engine', '/img/items/engine.png');
}

function create() {
    game.physics.startSystem(Phaser.Physics.ARCADE);

    parachute = game.add.sprite(100, 100, 'parachute');
    anti_spin = game.add.sprite(300, 300, 'anti_spin');
    command_module = game.add.sprite(900, 100, 'command_module');
    fuel_tank = game.add.sprite(400, 400, 'fuel_tank');
    engine = game.add.sprite(540, 30, 'engine');

    parachute.scale.x = 0.3;
    parachute.scale.y = 0.3;

    anti_spin.scale.x = 0.9;
    anti_spin.scale.y = 0.9;

    command_module.scale.x = 0.9;
    command_module.scale.y = 0.9;

    fuel_tank.scale.x = 1.2;
    fuel_tank.scale.y = 1.2;

    engine.scale.x = 0.9;
    engine.scale.y = 0.9;

    parachute.inputEnabled = true;
    parachute.input.enableDrag();

    anti_spin.inputEnabled = true;
    anti_spin.input.enableDrag();

    command_module.inputEnabled = true;
    command_module.input.enableDrag();

    fuel_tank.inputEnabled = true;
    fuel_tank.input.enableDrag();

    engine.inputEnabled = true;
    engine.input.enableDrag();


    game.physics.enable(command_module, Phaser.Physics.ARCADE);
    command_module.body.collideWorldBounds = true;

    game.physics.enable(parachute, Phaser.Physics.ARCADE);
    parachute.body.collideWorldBounds = true;

    game.physics.enable(anti_spin, Phaser.Physics.ARCADE);
    anti_spin.body.collideWorldBounds = true;

    game.physics.enable(fuel_tank, Phaser.Physics.ARCADE);
    fuel_tank.body.collideWorldBounds = true;

    game.physics.enable(engine, Phaser.Physics.ARCADE);
    engine.body.collideWorldBounds = true;
}

function render() {
  game.debug.text('Alinhe todas as peças no formato de uma espaçonave', 50, 30);
}

function update() {
    game.physics.arcade.collide(command_module, parachute, null, colisionComandParachute);
    game.physics.arcade.collide(command_module, anti_spin, null, colisionCommandSpin);
    game.physics.arcade.collide(anti_spin, fuel_tank, null, colisionSpinTank);
    game.physics.arcade.collide(fuel_tank, engine, null, colisionTankEngine);

    if (checkComandParachute && checkCommandSpin &&
        checkSpinTank && checkTankEngine) {
        handleFinal();
    }
}

function colisionComandParachute(command, parachute) {
    if ((parachute.y >= command.y - 100 && parachute.y <= command.y) &&
        (parachute.x >= command.x && parachute.x <= command.x + 300)
    ) {
        parachute.inputEnabled = false;
        command.inputEnabled = false;
        checkComandParachute = true;
    }
}

function colisionCommandSpin(command, anti_spin) {
    if ((anti_spin.y >= command.y && anti_spin.y <= command.y + 400) &&
        (anti_spin.x >= command.x && anti_spin.x <= command.x + 300)) {
        anti_spin.inputEnabled = false;
        command.inputEnabled = false;
        checkCommandSpin = true;
    }
}


function colisionSpinTank(spin, fuel_tank) {
    if ((fuel_tank.y >= spin.y && fuel_tank.y <= spin.y + 300) &&

        (fuel_tank.x >= spin.x && fuel_tank.x <= spin.x + 300)) {
        fuel_tank.inputEnabled = false;
        anti_spin.inputEnabled = false;
        checkSpinTank = true;
    }
}


function colisionTankEngine(fuel_tank, engine) {
    if ((engine.y >= fuel_tank.y && engine.y <= fuel_tank.y + 400) &&

        (fuel_tank.x >= engine.x && fuel_tank.x <= engine.x + 100)) {
        engine.inputEnabled = false;
        fuel_tank.inputEnabled = false;
        checkTankEngine = true;
    }
}


function handleFinal() {
    $(document).find('.cientist-box').show();
    $(document).find('.controls').show();
    text_cientist('Muito bem, você possui uma espaçonave agora, está tudo pronto para partir!');
}
