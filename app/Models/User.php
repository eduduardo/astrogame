<?php

namespace App\Models;

use Cache;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Image;

class User extends Authenticatable
{
    public $level_xp =
        [
        // level => xp_for_next_level
        1  => 6000,
        2  => 10000,
        3  => 12000,
        4  => 15000,
        5  => 20000,
        6  => 25000,
        7  => 30000,
        8  => 35000,
        9  => 40000,
        10 => 45000,
        11 => 50000,
        12 => 55000,
        13 => 60000,
        14 => 65000,
        15 => 70000,
        16 => 80000,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'nickname', 'password', 'confirm_code',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *  User Eloquent relations.
     */
    public function insignas()
    {
        return $this->hasMany('App\Models\InsignaLog');
    }

    public function history()
    {
        return $this->hasMany('App\Models\History');
    }

    public function config()
    {
        return $this->hasMany('App\Models\Config');
    }

    public function user_bag()
    {
        return $this->hasMany('App\Models\Bag');
    }

    public function quest_log()
    {
        return $this->hasMany('App\Models\QuestLog');
    }

    /**
     * Função para aumentar pontos de xp do jogador.
     *
     *  @TODO: REFACTOR
     *
     * @param int xp
     */
    public function gain_xp($xp)
    {
        $this->xp += $xp;

        while ($this->xp >= $this->xp_for_next_level()) {
            $this->level += 1;
        }

        $this->save();
    }

    public function gain_money($money)
    {
        $this->money += $money;
        $this->save();
    }

    public function remove_money($money)
    {
        $final = $this->money - $money;
        if ($final > $this->money) {
            $this->money = 0;
        } else {
            $this->money = $final;
        }

        $this->save();
    }

    // pega o xp e transforma em porcentagem
    public function xp_bar()
    {
        $porcent = ($this->xp * 100) / $this->xp_for_next_level();

        return round($porcent);
    }

    public function xp_for_next_level()
    {
        if (isset($this->level_xp[$this->level + 1])) {
            return $this->level_xp[$this->level + 1];
        } else {
            return $this->level_xp[15];
        }
    }

    public function patente()
    {
        if ($this->type == 3) {
            return trans('game.patent-gm');
        }

        if ($this->level <= 3) {
            return trans('game.patent1');
        } elseif ($this->level >= 4 && $this->level <= 6) {
            return trans('game.patent2');
        } elseif ($this->level >= 7 && $this->level <= 9) {
            return trans('game.patent3');
        } elseif ($this->level >= 10 && $this->level < 12) {
            return trans('game.patent4');
        } elseif ($this->level >= 13 && $this->level <= 14) {
            return trans('game.patent5');
        } else {
            return trans('game.patent6');
        }
    }

    public function desde()
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);

        return (\App::isLocale('pt-br')) ? $date->format('d/m/Y') : $date->format('d-m-Y');
    }

    public function makeAvatar($url = '')
    {
        $path = public_path('users/avatar/'.sha1($this->nickname.env('APP_KEY')).'.jpg');
        $width = 1000;
        $height = 1000;

        // caso já existir um avatar no lugar
        if (file_exists($path)) {
            unlink($path);
        }

        if (!empty($url)) {
            try {
                $avatar = Image::make($url)->fit($width, $height)->save($path);
            } catch (Exception $e) {
                // default avatar
            }
        }
    }

    public function avatar()
    {
        $path = 'users/avatar/'.sha1($this->nickname.env('APP_KEY')).'.jpg';
        $default = 'img/avatar.png';
        if (file_exists(public_path($path))) {
            return url($path);
        } else {
            return url($default);
        }
    }

    public function remove_avatar()
    {
        $path = 'users/avatar/'.sha1($this->nickname.env('APP_KEY')).'.jpg';
        if (file_exists(public_path($path))) {
            return unlink($path);
        }

        return true;
    }

    public function getConfig($config_key)
    {
        return Config::getConfig($config_key, $this);
    }

    public function isOnline()
    {
        if (Cache::has('user-is-online-'.$this->id)) {
            $this->online = true;
            $this->save();

            return true;
        } else {
            $this->online = false;
            $this->save();

            return false;
        }
    }

    public function bag()
    {
        return $this->user_bag()->with('item')->select(DB::raw("SUM(amount) as 'amount', id, item_id, user_id"))
                    ->groupBy('item_id')->get();
    }

    public function has_item($item_id)
    {
        $check_item = $this->user_bag()->select('id')->where('item_id', $item_id)->limit(1)->first();

        return ($check_item) ? true : false;
    }

    public function count_has_items(array $items_id)
    {
        $check_items = $this->user_bag()->select('id')->whereIn('item_id', $items_id)->get();

        return ($check_items) ? $check_items->count() : false;
    }

    public function has_item_amount($item_id)
    {
        $bag_item = $this->user_bag()->with('item')->select(DB::raw("SUM(amount) as 'amount'"))
                         ->where('item_id', $item_id)->groupBy('item_id')->limit(1)->first();

        return ($bag_item) ? $bag_item->amount : 0;
    }

    public function generate_nickname()
    {
        $from = 'áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ';
        $to = 'aaaaeeiooouucAAAAEEIOOOUUC';

        $nickname = strtolower(strtr(str_replace(' ', '', $this->name), $from, $to));

        $count = 1;
        if ($this->where('nickname', $nickname)->select('id')->first()) {
            $new_nickname = $nickname.$count;
            while ($this->where('nickname', $new_nickname)->select('id')->first()) {
                ++$count;
                $new_nickname = $nickname.$count;
            }
        }
        $this->nickname = isset($new_username) ? $new_nickname : $nickname;
        $this->save();

        return $this->nickname;
    }

    public function add_item($item_id, $amount = 1)
    {
        $bag_slot = new \App\Models\Bag();
        $bag_slot->user_id = $this->id;
        $bag_slot->item_id = $item_id;
        $bag_slot->amount = $amount;
        $bag_slot->save();
    }

    public function gain_insigna($insina_key)
    {
        $insigna = \App\Models\Insignas::where('key', $insina_key)->first();
        if ($insigna) {
            $insigna_slot = new \App\Models\InsignaLog();
            $insigna_slot->user_id = $this->id;
            $insigna_slot->insigna_id = $insigna->id;

            return $insigna_slot->save();
        }
    }
}
