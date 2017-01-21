<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class PlayerLevel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'astrogame:level {email} {level}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Muda o level de um usuario';

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
    // bugged
    public function handle()
    {
        $email = $this->argument('email');
        $level = $this->argument('level');

        $user = User::where('email', $email)->first();

        if (!$user) {
            return $this->error("[ ERRO ] $email nao esta associado com nenhuma conta");
        }

        if ($level > 15) {
            return $this->info('[ ERRO ] level tem que ser menor que 15, nada foi alterado');
        }

        foreach ($user->level_xp as $array_level => $array_xp) {
            if ($array_level == $level + 1) {
                $xp = $array_xp; // arrumar erro no level máximo
            }
        }

        $user->level = $level;
        $user->xp = $xp;
        $user->save();

        return $this->info("[ INFO ] Level do jogador alterado para $level");
    }
}
