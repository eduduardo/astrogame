<?php

namespace App\Http\Middleware;

use App\Models\Config;
use App\Models\Insignas;
use App\Models\Item;
use App\Models\Observatory;
use App\Models\Quest;
use App\Models\User;
use Cache;
use Closure;
use DB;

class SetGameVars
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->ajax()) {
            $ajax = true;
        } else {
            $ajax = false;
        }

        // game vars
        if (auth()->check()) {
            $planet = new Observatory(); // melhor isso daqui
            $planet->get_users_planetarium();

            $insignas = $this->insignas();
            $shop = $this->shop_items();
            $ranking = $this->ranking();

            view()->composer('game.general.general', function ($view) use ($planet, $insignas, $shop, $ranking, $ajax) {
                $view->with('user_name', auth()->user()->nickname)
                       ->with('user_level', auth()->user()->level)
                       ->with('user_money', auth()->user()->money)
                       ->with('user_xp', auth()->user()->xp)
                       ->with('music_volume', auth()->user()->getConfig('music_volume'))
                       ->with('effects_volume', auth()->user()->getConfig('effects_volume'))
                       ->with('profile_private', auth()->user()->getConfig('private'))
                       ->with('tutorial', auth()->user()->getConfig('tutorial'))
                       ->with('xp_bar', auth()->user()->xp_bar())
                       ->with('xp_for_next_level', auth()->user()->xp_for_next_level())
                       ->with('lang', session()->get('language', 'pt-br'))
                       ->with('bag', auth()->user()->bag())
                       ->with('user_insignas', auth()->user()->insignas)
                       ->with('all_insignas', $insignas)
                       ->with('ranking', $ranking)
                       ->with('shop', $shop)
                       ->with('avaliable_quests', Quest::avaliable_quests())
                       ->with('accepted_quests', Quest::accepted_quests())
                       ->with('planetarium', $planet->planetarium)
                       ->with('ajax', $ajax);
            });
        } else {
            // guest user
          view()->composer('game.general.general', function ($view) use ($ajax) {
              $view->with('ajax', $ajax)
                     ->with('music_volume', 0)
                     ->with('effects_volume', 0);
          });
        }

        return $next($request);
    }

    public function shop_items()
    {
        $telescopios = Cache::rememberForever('telescopios', function () {
            return Item::where('category', 2)->get();
        });

        $livros = Cache::rememberForever('livros', function () {
            return Item::where('category', 4)->get();
        });

        $nave = Cache::rememberForever('nave', function () {
            return Item::where('category', 3)->get();
        });

        return ['telescopios' => $telescopios, 'livros' => $livros, 'nave' => $nave];
    }

    public function ranking()
    {
        return Cache::remember('ranking', 5, function () {
            DB::statement(DB::raw('set @row:=0'));

            return User::select(DB::raw('@row:=@row+1 as row'), 'id', 'name', 'level', 'xp', 'nickname')
                      ->whereHas('config', function ($q) {
                          $q->where('key', 'private')->where('content', false);
                      })->where('xp', '>', 0)->limit(500)->orderBy('xp', 'DESC')->get();
        });
    }

    public function insignas()
    {
        return Cache::rememberForever('insignas', function () {
            return Insignas::all();
        });
    }
}
