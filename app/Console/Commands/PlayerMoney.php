<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class PlayerMoney extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'astrogame:money {email} {money}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Muda a quantidade de astrocoins de um usuario';

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
        $email = $this->argument('email');
        $money = $this->argument('money');

        $user = User::where('email', $email)->get()->first();

        if (!$user) {
            return $this->error("[ERRO] $email nao esta associado com nenhuma conta");
        }

        $user->money = $money;
        $user->save();

        return $this->info("[INFO] Dinheiro do jogador alterado para $money");
    }
}
