<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $timestamps = false;

    public static $default = [
        'music_volume'   => 50,
        'effects_volume' => 50,
        'lang'           => 'pt-br',
        'private'        => false,
        'tutorial'       => true,
    ];

    public static function getConfig($config_key, User $user)
    {
        if (!array_key_exists($config_key, self::$default)) {
            return false;
        }

        $config = self::select('content')->where('user_id', $user->id)->where('key', $config_key)->limit(1)->first();
        if ($config) {
            return $config->content;
        } else {
            return self::$default[$config_key];
        }
    }

    public static function setConfig($config_key, $content)
    {
        if (!array_key_exists($config_key, self::$default)) {
            return false;
        }

        if (!auth()->check()) { // @TODO not more needed
            return false;
        }

        if (self::select('key')->where('user_id', auth()->user()->id)->where('key', $config_key)->limit(1)->first()) {
            self::where('user_id', auth()->user()->id)
                ->where('key', $config_key)
                ->limit(1)
                ->update(['content' => $content]);
        } else {
            self::insert(['key' => $config_key, 'content' => $content, 'user_id' => auth()->user()->id]);
        }
    }

    public static function installConfig($user_id = 0)
    {
        if ($user_id != 0) {
            if (auth()->check()) {
                $user_id = auth()->user()->id;
            }
        }

        foreach (self::$default as $key => $content) {
            /* if($key == 'lang'){
            if(empty(session()->get('language'))){
            $content = 'pt-br';
            }
            $content = session()->get('language');
            } */
            $config = new self();
            $config->key = $key;
            $config->content = $content;
            $config->user_id = $user_id;
            $config->save();
        }
    }
}
