<?php

namespace App\Listeners;

use App\Events\RegisterUser;
use App\Models\Config;
use Mail;

class RegisterUsers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param RegistersUsers $event
     *
     * @return void
     */
    public function handle(RegisterUser $event)
    {
        // faz o avatar do usuário
        $event->user->makeAvatar();

        // instala configurações básicas de usuário
        Config::installConfig($event->user->id);

        // autentica caso não estiver autenticado
        auth()->login($event->user, true);

        // gera o nickname
        $event->user->generate_nickname();
        session()->put('notify',
        [
            ['text' => '<i class="uk-icon-user"></i> Seu nickname é <strong>'.$event->user->nickname.'</strong> ', 'status' => 'success', 'timeout'=> 0],
        ]);

        if (env('APP_ENV') !== 'local') {
            // confirmação
          $data = ['name' => $event->user->name, 'email' => $event->user->email, 'confirm_code' => $event->user->confirm_code];
            Mail::send('emails.verify', $data, function ($message) use ($data) {
                $message->from('astrogame@astrogame.me', 'Astrogame');
                $message->subject('Confirmação do Astrogame');
                $message->to($data['email']);
            });
        } elseif (env('APP_ENV') === 'local') {
            $event->user->confirmed = true;
            $event->user->save();
        }
    }
}
