<?php

namespace App\Console\Commands;

use App\Models\Bag;
use App\Models\History;
use App\Models\InsignaLog;
use App\Models\QuestLog;
use App\Models\User;
use Illuminate\Console\Command;

class GameReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'astrogame:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reseta as atividades do astrogame';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Voce tem certeza que quer resetar tudo do astrogame?')) {
            User::query()->update(['level' => 1, 'xp' => 0, 'money' => 100]);
            QuestLog::query()->delete();
            InsignaLog::query()->delete();
            History::query()->delete();
            Bag::query()->delete();

            $users = User::all();
            foreach ($users as $user) {
                $user->gain_insigna('beta');
            }

            $this->info('Jogo resetado com sucesso');
        }
    }
}
