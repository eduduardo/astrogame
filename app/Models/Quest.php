<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    public $timestamps = false;

    // player avaliable quests
    public static function avaliable_quests()
    {
        $quests = self::whereNotIn('id', function ($query) {
            $query->select('quest_id')
                ->from('quest_logs')
                ->where('user_id', auth()->user()->id);
        })
            ->select(['quests.id', 'name', 'title', 'type', 'description', 'objetivos', 'recompensas', 'min_level', 'max_level', 'xp_reward', 'money_reward'])
            ->where('min_level', '<=', auth()->user()->level)
            ->get();

        return $quests;
    }

    // player avaliable quests
    public static function accepted_quests()
    {
        $user_id = auth()->user()->id;

        $quests = self::join('quest_logs', 'quests.id', '=', 'quest_logs.quest_id')
            ->select(['quests.id', 'name', 'title', 'type', 'description', 'objetivos', 'recompensas', 'min_level', 'max_level', 'xp_reward', 'money_reward'])
            ->where('quest_logs.user_id', $user_id)
            ->where('quest_logs.completed', false)
            ->get();

        return $quests;
    }
}
