<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GMList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'astrogame:gmlist';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lista todos os game masters e admins do jogo';

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
        $users = User::select('name', 'email', 'type')->where('type', '>', '1')->get()->all();
        foreach ($users as $user) {
            $this->info($user);
        }
    }
}
