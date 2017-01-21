<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsignaLog extends Model
{
    public function insigna()
    {
        return $this->belongsTo('App\Models\Insignas');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function history_insigna(User $user, Insignas $insigna)
    {
        $history = new \App\Models\History();
        $history->user_id = $user->id;
        $history->texto = 'Ganhou a insigna <strong>'.$insigna->name.'</strong>';
        $history->icon = 'gear';
        $history->save();
    }
}
