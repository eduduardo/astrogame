<?php

namespace App\Providers;

use App\Events\RegisterUser;
use App\Models\Bag;
use App\Models\History;
use App\Models\InsignaLog;
use App\Models\QuestLog;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV', 'local') !== 'local') {
            \DB::connection()->disableQueryLog();
        }

        User::created(function ($user) {
            event(new RegisterUser($user));
        });

        InsignaLog::created(function ($insigna_log) {
            $history = new History();
            $history->user_id = $insigna_log->user_id;
            $history->texto = 'Ganhou a insigna <strong>'.$insigna_log->insigna->name.'</strong>';
            $history->icon = 'rocket';
            $history->save();
        });

        Bag::created(function ($bag) {
            $history = new History();
            $history->user_id = $bag->user_id;
            $history->texto = 'Comprou <strong>'.$bag->item->name.'</strong> por  '.$bag->item->price.' astrocoins';
            $history->icon = 'shopping-cart';
            $history->save();
        });

        QuestLog::updated(function ($quest) {
            if ($quest->completed == true) {
                $history = new History();
                $history->user_id = $quest->user_id;

                if ($quest->quest_info->type == 2) {
                    $history->texto = 'Completou o capítulo <strong>'.$quest->quest_info->title.'</strong>';
                    $history->icon = 'exclamation-circle';
                } else {
                    $history->texto = 'Completou a quest <strong>'.$quest->quest_info->title.'</strong> e ganhou '.$quest->quest_info->xp_reward.' pontos de XP';
                    $history->icon = 'exclamation';
                }
                $history->save();
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
