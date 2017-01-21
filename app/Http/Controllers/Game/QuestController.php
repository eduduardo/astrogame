<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestRequest;
use App\Models\Quest;
use App\Models\QuestLog;
use App\Models\User;
use Illuminate\Http\Request;

class QuestController extends GameController
{
    /**
     * Request para aceitar uma missão.
     *
     * @param QuestRequest $request
     *
     * @return json
     */
    public function quest_accept(QuestRequest $request)
    {
        $quest_id = $request->id;

        $quest_user = new QuestLog();
        $quest_user->quest_id = $quest_id;
        $quest_user->user_id = auth()->user()->id;

        $status = ($quest_user->accept_quest()) ? true : false;
        $quest = Quest::select('name')->where('id', $request->id)->limit(1)->first();

        return $this->display_quest($quest->name);
    }

    /**
     * Request para cancelar uma quest.
     *
     * @param QuestRequest $request | quest id
     *
     * @return json
     */
    public function quest_cancel(QuestRequest $request)
    {
        $quest_id = $request->id;

        $quest_user = new QuestLog();
        $quest_user->quest_id = $quest_id;
        $quest_user->user_id = auth()->user()->id;

        $status = ($quest_user->cancel_quest()) ? true : false;

        return response()->json(['canceled' => $status]);
    }

    /**
     * Request para completar uma missão.
     *
     * @param Request $request
     *
     * @return json
     */
    public function quest_complete(Request $request)
    {
        $quest = Quest::select('id')->where('name', $request->name)->limit(1)->first();
        if (!$quest) {
            return response()->json(['status' => false, 'text' => 'Nenhuma quest com esse nome encontrada']);
        }
        $quest_id = $quest->id;

        $quest_user = new QuestLog();
        $quest_user->quest_id = $quest_id;
        $quest_user->user_id = auth()->user()->id;

        if ($quest_user->complete_quest()) {
            $this->reward_user($quest_user, auth()->user());

            session()->put('notify',
            [
                ['text' => '<i class="uk-icon-exclamation"></i> Missão: '.$quest_user->quest_info->title.' completada', 'status' => 'success', 'timeout' => 3000],
                ['text' => '<i class="uk-icon-money"></i> Ganhou: '.$quest_user->quest_info->money_reward.' de astrocoins', 'status' => 'warning', 'timeout' => 3000],
                ['text' => '<i class="uk-icon-arrow-up"></i> Ganhou: '.$quest_user->quest_info->xp_reward.' de XP ', 'status' => 'warning', 'timeout' => 3000],
            ]);

            return response()->json(['status' => true]);
        } else {
            session()->put('notify',
            [
              ['text' => '<i class="uk-icon-exclamation"></i> Erro ao completar a missão '.$quest_user->quest_info->title, 'status' => 'danger', 'timeout' => 4000],
            ]);

            return response()->json(['status' => false]);
        }
    }

    /**
     * Função para recompensa.
     *
     * @param QuestLog $user_quest [description]
     * @param User     $user       [description]
     */
    public function reward_user(QuestLog $user_quest, User $user)
    {
        $user->gain_xp($user_quest->quest_info->xp_reward);
        $user->gain_money($user_quest->quest_info->money_reward);
        $user->gain_insigna($user_quest->quest_info->insigna_reward);
    }

    /**
     * Request de uma missão.
     *
     * @param Request $request [description]
     *
     * @return [type] [description]
     */
    public function quest(Request $request)
    {
        $quest = Quest::select('id')->where('name', $request->name)->limit(1)->first();
        if (!$quest) {
            session()->put('notify',
            [
                ['text' => '<i class="uk-icon-exclamation"></i> Nenhuma missão encontrada', 'status' => 'danger', 'timeout' => 0],
            ]);

            return redirect('/game');
        }

        $quest_log = QuestLog::select('id', 'completed')->where('user_id', auth()->user()->id)->where('quest_id', $quest->id)->first();
        if ($quest_log && $quest_log->completed) {
            session()->put('notify',
          [
              ['text' => '<i class="uk-icon-exclamation"></i> Você já completou essa missão!', 'status' => 'danger', 'timeout' => 0],
          ]);

            return redirect('/game');
        } elseif (!$quest_log) {
            session()->put('notify',
            [
                ['text' => '<i class="uk-icon-exclamation"></i> Você ainda não aceitou essa missão!', 'status' => 'danger', 'timeout' => 0],
            ]);

            return redirect('/game');
        }

        return $this->display_quest($request->name);
    }

    public function display_quest($name)
    {
        $view = 'game.quests.'.$name;

        if (view()->exists($view)) {
            return view($view, ['quest' => $name]);
        } else {
            return view('game.quests.soon');
        }
    }
}
