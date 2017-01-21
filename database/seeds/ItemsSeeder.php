<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    //
    // categories:
    // 1 - misc
    // 2 - telescopio
    // 3 - livros
    // 4 - ??
    //
    public $items = [

        [
            'id'          => 1,
            'category'    => 2,
            'name'        => 'Tubo de telescópio',
            'description' => 'Tubo de metal ideial para amadores',
            'price'       => 300,
            'img_url'     => 'tubo-telescopico',
        ],

        [
            'id'          => 2,
            'category'    => 2,
            'name'        => 'Buscador',
            'description' => '',
            'price'       => 50,
            'img_url'     => 'buscador',
        ],

        [
            'id'          => 3,
            'category'    => 2,
            'name'        => 'Portaocular',
            'description' => '',
            'price'       => 100,
            'img_url'     => 'portaocular',
        ],

        [
            'id'          => 4,
            'category'    => 2,
            'name'        => 'Tripé',
            'description' => '',
            'price'       => 200,
            'img_url'     => 'tripe',
        ],

        [
            'id'          => 5,
            'category'    => 3,
            'name'        => 'Módulo de comando',
            'description' => '',
            'price'       => 400,
            'img_url'     => 'command_module',
        ],

        [
            'id'          => 6,
            'category'    => 3,
            'name'        => 'Tanque de combustível',
            'description' => '',
            'price'       => 310,
            'img_url'     => 'fuel_tank',
        ],

        [
            'id'          => 7,
            'category'    => 3,
            'name'        => 'Motor da nave',
            'description' => '',
            'price'       => 500,
            'img_url'     => 'engine',
        ],

        [
            'id'          => 8,
            'category'    => 3,
            'name'        => 'Módulo anti rotação',
            'description' => '',
            'price'       => 300,
            'img_url'     => 'anti_spin',
        ],

        [
            'id'          => 9,
            'category'    => 3,
            'name'        => 'Paraquedas',
            'description' => '',
            'price'       => 50,
            'img_url'     => 'parachute',
        ],

        [
            'id'          => 10,
            'category'    => 4,
            'name'        => 'Livro de constelações v.1',
            'description' => '',
            'price'       => 500,
            'img_url'     => 'book_1',
        ],

        [
            'id'          => 11,
            'category'    => 4,
            'name'        => 'Livro de constelações v.2',
            'description' => '',
            'price'       => 600,
            'img_url'     => 'book_2',
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::getQuery()->delete();

        foreach ($this->items as $item) {
            Item::insert($item);
            $this->command->info('Item: '.e($item['name']).' adicionado.');
        }
    }
}
