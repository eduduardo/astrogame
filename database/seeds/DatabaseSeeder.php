<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ItemsSeeder::class);
        $this->call(QuestsSeeder::class);
        $this->call(InsignasSeeder::class);

        if (env('APP_ENV') == 'local') {
            $confirm = $this->command->confirm('Deseja rodar os test seeders?');
            if ($confirm) {
                factory(App\Models\User::class, 20)->create()->each(function ($user) {
                    factory(App\Models\History::class, 15)->create(['user_id' => $user->id]);
                    factory(App\Models\QuestLog::class, 2)->create(['user_id' => $user->id]);
                    factory(App\Models\Bag::class, 5)->create(['user_id' => $user->id]);
                    factory(App\Models\InsignaLog::class, 10)->create(['user_id' => $user->id]);
                });
                $this->command->info('Adicionado 20 users aleatorios com history, quests, bag e insignas');
            }
        }
    }
}
