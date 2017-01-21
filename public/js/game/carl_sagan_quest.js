var game = new Phaser.Game('100', '100', Phaser.CANVAS, 'game', {
    preload: preload,
    create: create,
    update: update,
    render: render
});

var stars;
var asteroids;
var lazers;
var player;
var cursors;
var fireButton;
var voyager;
var bulletTime = 0;
var frameTime = 0;
var frames;
var prevCamX = 0;
var camDelta = 0;
var score = 0;
var timer = 0;
var fire;
var life = 3;
var velocity = 8;
var velocity_text = false;

function preload() {

    game.load.image('player', '/games/ship.png');
    game.load.image('voyager', '/games/voyager.png');
    game.load.image('star', '/games/star.png');
    game.load.image('asteroid', '/games/asteroid.png');
    game.load.image('lazer', '/games/greenLaserRay.png');
    game.load.image('juptier', '/games/juptier.png');
    game.load.image('boost', '/games/boost.png');

    game.load.audio('fire', '/games/blaster.mp3');
    game.load.audio('explosion', '/games/explosion.mp3');
    game.load.audio('star_effect', '/games/collect.mp3');


}

function create() {
    timer = game.time.create(false);
    timer.start();
    timer.loop(5000);

    fire = game.add.audio('fire');
    explosion = game.add.audio('explosion');
    star_effect = game.add.audio('star_effect');

    game.physics.startSystem(Phaser.Physics.ARCADE);
    game.world.setBounds(0, 0, 800 * 10, 1000);
    game.stage.disableVisibilityChange = true;

    stars = game.add.physicsGroup();

    asteroids = game.add.group();
    asteroids.enableBody = true;
    asteroids.physicsBodyType = Phaser.Physics.ARCADE;

    boost = game.add.group();
    boost.enableBody = true;
    boost.physicsBodyType = Phaser.Physics.ARCADE;

    lazers = game.add.group();
    lazers.enableBody = true;
    lazers.physicsBodyType = Phaser.Physics.ARCADE;

    player = game.add.sprite(100, 300, 'player');
    game.physics.enable(player, Phaser.Physics.ARCADE);
    player.body.collideWorldBounds = true;
    player.anchor.x = 0.5;
    game.physics.arcade.enable(player);

    game.camera.follow(player, Phaser.Camera.FOLLOW_LOCKON, 0.1);

    cursors = game.input.keyboard.createCursorKeys();
    fireButton = game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);

    prevCamX = game.camera.x;

    juptier = game.add.sprite(game.world.width - 500, 300, 'juptier');
    voyager = game.add.sprite(game.world.width - 350, 450, 'voyager');
    voyager.scale.x = -0.4;
    voyager.scale.y = 0.4;
    game.physics.arcade.enable(voyager);

    populate();
}

function populate() {
    for (var i = 0; i < game.rnd.integerInRange(3, 10); i++) {
        boost.create(game.world.randomX, game.world.randomY, 'boost');
    }

    for (var i = 0; i < game.rnd.integerInRange(50, 128); i++) {
        asteroids.create(game.world.randomX, game.world.randomY, 'asteroid');
    }

    for (var i = 0; i < game.rnd.integerInRange(128, 200); i++) {
        stars.create(game.world.randomX, game.world.randomY, 'star');
    }

}

function processHandler(player, veg) {

    return true;

}

function collisionStarHandler(player, star) {
    star.kill();
    score++;
    star_effect.play();
}

function collisionFireHandler(lazer, asteroid) {
    asteroid.kill();
    lazer.kill();
    explosion.play();
    score += 3;
}

function collisionPlayer(player, asteroid) {
    player.x = 100;
    player.y = 300;
    asteroid.kill();
    explosion.play();
    velocity = 8;
    score = 0;
    life -= 1;

}


function handleDead() {
    $(document).find('.cientist-box').show();
    text_cientist('Você perdeu, tente novamente!');
    asteroids.forEach(function(asteroid) {
        asteroid.kill();
    });
    stars.forEach(function(star) {
        star.kill();
    });
    boost.forEach(function(bost) {
        bost.kill();
    });
    life = 3;
    populate();
    player.x = 100;
    player.y = 300;
}

function restart() {
    game.state.restart();
}

function handleBoost(player, boost) {
    boost.kill();

    velocity += 4;
}

function handleVoyager(player, voyager) {
    $(document).find('.cientist-box').show();
    $(document).find('.controls').show();
    text_cientist('Wow, você achou a voayger!');
    player.kill();
}

function update() {
    removeCarl();

    game.physics.arcade.collide(player, stars, collisionStarHandler, processHandler, this);
    game.physics.arcade.overlap(lazers, asteroids, collisionFireHandler, null, this);
    game.physics.arcade.overlap(player, asteroids, collisionPlayer, null, this);
    game.physics.arcade.overlap(player, boost, handleBoost, null, this);
    game.physics.arcade.overlap(player, voyager, handleVoyager, null, this);

    if (life == 0) {
        handleDead();
    }

    if (cursors.left.isDown) {
        player.x -= velocity;
        player.scale.x = -1;
    } else if (cursors.right.isDown) {
        player.x += velocity;
        player.scale.x = 1;
    }

    if (cursors.up.isDown) {
        player.y -= velocity;
    } else if (cursors.down.isDown) {
        player.y += velocity;
    }

    if (fireButton.isDown) {
        fireBullet();
    }

    lazers.forEachAlive(updateBullets, this);
    asteroids.forEachAlive(updateAsteroids, this);
    prevCamX = game.camera.x;

    if (velocity_text == false && velocity > 13) {
        $(document).find('.cientist-box').show();
        text_cientist('Wow, você está quase atingindo a velocidade da luz! Tome cuidado com os asteroides');
        velocity_text = true;
    }
}

function updateAsteroids(asteroid) {

}

function updateBullets(lazer) {

    // if (game.time.now > frameTime)
    // {
    //     frameTime = game.time.now + 500;
    // }
    // else
    // {
    //     return;
    // }

    //  Adjust for camera scrolling
    var camDelta = game.camera.x - prevCamX;
    lazer.x += camDelta;

    if (lazer.scale.x === 1) {
        lazer.x += 16;

        if (lazer.x > (game.camera.view.right)) {
            lazer.kill();
        }
    } else {
        lazer.x -= 16;

        if (lazer.x < (game.camera.view.left)) {
            lazer.kill();
        }
    }

}

function fireBullet() {

    if (game.time.now > bulletTime) {
        //  Grab the first bullet we can from the pool
        lazer = lazers.getFirstDead(true, player.x + 32 * player.scale.x, player.y + 28, 'lazer');

        lazer.scale.x = player.scale.x;

        if (lazer.scale.x === 1) {
            // lazer.anchor.x = 1;
        } else {
            // lazer.anchor.x = 0;
        }

        //  Lazers start out with a width of 96 and expand over time
        // lazer.crop(new Phaser.Rectangle(244-96, 0, 96, 2), true);

        bulletTime = game.time.now + 200;
        fire.play();
    }

}
var timer_running = true;

function removeCarl() {
    if (timer_running && timer.duration < 100) {
        $(document).find('.cientist-box').hide();
        timer.stop();
        timer_running = false;
    }
}

function render() {
    game.debug.text('Pontos: ' + score, 100, 32);
    game.debug.text('Vidas: ' + life, 300, 32);
}
