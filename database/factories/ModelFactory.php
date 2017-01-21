<?php

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt(str_random(10)),
        'nickname'       => str_random(10),
        'type'           => 1,
        'gender'         => rand(1, 0),
        'remember_token' => str_random(10),
        'xp'             => rand(200, 10000),
        'level'          => rand(1, 13),
    ];
});

$factory->define(App\Models\History::class, function (Faker\Generator $faker) {
    return [
        'texto' => $faker->sentence(5),
        'icon'  => function () {
            $icons = ['check', 'space-shuttle', 'shopping-cart', 'exclamation'];
            $random_index = rand(0, count($icons) - 1);

            return $icons[$random_index];
        },
    ];
});

$factory->define(App\Models\QuestLog::class, function (Faker\Generator $faker) {
    return [
        'quest_id'  => \App\Models\Quest::orderByRaw('RAND()')->first()->id,
        'completed' => rand(0, 1),
    ];
});

$factory->define(App\Models\Bag::class, function (Faker\Generator $faker) {
    return [
        'item_id' => \App\Models\Item::orderByRaw('RAND()')->first()->id,
        'amount'  => rand(0, 3),
    ];
});

$factory->define(App\Models\InsignaLog::class, function (Faker\Generator $faker) {
    return [
        'insigna_id' => \App\Models\Insignas::orderByRaw('RAND()')->first()->id,
    ];
});
