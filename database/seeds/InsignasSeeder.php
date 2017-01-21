<?php

use App\Models\Insignas;
use Illuminate\Database\Seeder;

class InsignasSeeder extends Seeder
{
    public $insignas = [

      [
          'name'   => 'Astrogame Staff',
          'reason' => 'Faz parte da equipe de desenvolvimento do astrogame, insigna exclusiva apenas de 5 membros',
          'how'    => 'Fazer parte da equipe de desenvolvimento',
          'key'    => 'astrogame_staff',
      ],

      [
          'name'   => 'Beta tester',
          'reason' => 'Entrou no começo do astrogame e ajudou o jogo crescer :)',
          'how'    => 'Ter participado da versão beta do astrogame durante seu período de desenvolvimento',
          'key'    => 'beta',
      ],

      [
          'name'   => 'Apollo 11',
          'reason' => 'That\'s one small step for a man, one giant leap for mankind.',
          'how'    => 'Obtida ao assistir à simulação do pouso da Apollo 11 na lua! ',
          'key'    => 'apollo_11',
      ],

      [
          'name'   => 'XV Expoete 2016',
          'reason' => 'Visitou o stand do projeto durante a expoete da ETEC Pedro Ferreira Alves',
          'how'    => 'Ter visitado o projeto e obtido o código no stand para ganhar essa insigna',
          'key'    => 'expoete',
      ],

    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        Insignas::getQuery()->delete();

        foreach ($this->insignas as $insigna) {
            Insignas::insert($insigna);
            $this->command->info(e($insigna['name']).' adicionada.');
        }
    }
}
