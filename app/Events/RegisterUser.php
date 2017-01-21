<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class RegisterUser extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
