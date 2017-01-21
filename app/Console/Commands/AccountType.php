<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AccountType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'astrogame:type {email} {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mudar tipo de conta de um usuario (1 = normal / 2 = game master / 3 = admin)';

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
        $types_avaliables = [1 => 'normal', 2 => 'game master', 3 => 'admin'];
        $email = $this->argument('email');
        $type = $this->argument('type');

        if (!array_key_exists($type, $types_avaliables)) {
            return $this->error('Tipo de conta nao disponivel');
        }

        $user = User::where('email', $email)->get()->first();

        if (!$user) {
            return $this->error("[ERRO] $email nao esta associado com nenhuma conta");
        }

        $user->type = $type;
        $user->save();

        if ($type == 3) { // adiciona astrogame staff insigna
            $user->gain_insigna('astrogame_staff');
        }

        return $this->info('[INFO] Usuario alterado para : '.$types_avaliables[$type]);
    }
}
