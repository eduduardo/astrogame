<?php

namespace App\Http\Controllers;

use App\Models\QuestLog;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Share;

// toda a magia vai acontecer aqui :)
class GameController extends Controller
{
    public function index()
    {
        $user_insignas = auth()->user()->insignas->map(function ($insigna_log) {
            return ['key' => $insigna_log->insigna->key];
        });

        if (session()->has('promo') && session('promo') == 'expoete2016' && $user_insignas->contains('key', 'expoete') == false) {
            session()->put('notify',
          [
              ['text' => '<i class="uk-icon-exclamation"></i> Obrigado por ter visitado nosso stand!', 'status' => 'warning', 'timeout' => 5000],
              ['text' => '<i class="uk-icon-user-plus"></i> Você ganhou uma nova insignas!', 'status' => 'success', 'timeout' => 5000],
              ['text' => '<i class="uk-icon-arrow-circle-up"></i> Você ganhou 500 XP!', 'status' => 'success', 'timeout' => 5000],
              ['text' => '<i class="uk-icon-money"></i> Você ganhou 300 astrocoins!', 'status' => 'success', 'timeout' => 5000],
          ]);

            auth()->user()->gain_insigna('expoete');
            auth()->user()->gain_xp(500);
            auth()->user()->gain_money(300);
        }

        $completed = QuestLog::is_quest_completed(1, auth()->user());

        return view('game.welcome', ['completed' => $completed]);
    }

    /**
     * Perfil público de um jogador, caso o usuário escolher privado redireciona
     * para o index.
     *
     * @param Request $request
     *
     * @return mixed | redirect ou a página
     */
    public function player(Request $request)
    {
        $user = null;
        // primeiro checa se não é o próprio usuário
        if (auth()->check()) {
            if ($request->nickname == auth()->user()->nickname) {
                $user = auth()->user();
            }
        }

        // se ainda não achou nenhum usuário procura e verifica se não é privado
        if ($user == null) {
            $user = User::where('nickname', $request->nickname)->whereHas('config', function ($q) {
                $q->where('key', 'private')->where('content', false);
            })->first();
        }

        // checagens
        if (!$user) {
            session()->put('notify',
                [
                    ['text' => '<i class="uk-icon-user-secret"></i> Esse usuário é privado', 'status' => 'danger', 'timeout' => 1000],
                ]);

            return redirect('/');
        }

        // ranking - não sei qual bruxaria faz essa query aqui, mas funciona
        $ranking = User::selectRaw(DB::raw('FIND_IN_SET( xp, (SELECT GROUP_CONCAT( xp ORDER BY xp DESC ) FROM users )) AS rank'))
                        ->where('nickname', $user->nickname)->first();

        return view('game.general.player-public', ['player'      => $user,
                                                   'player_rank' => $ranking->rank,
                                                   'social'      => (object) Share::load(url()->current(), 'Veja meu perfil no astrogame', url('/img/avatar.png'))->services('facebook', 'gplus', 'twitter', 'tumblr', 'pinterest'), ]);
    }

    public function construct_logo()
    {
        return response()->file(public_path('img/loading-logo.png'));
    }
}
