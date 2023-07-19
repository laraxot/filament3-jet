<?php

namespace ArtMin96\FilamentJet\Events;

use ArtMin96\FilamentJet\Contracts\UserContract;
use Illuminate\Foundation\Events\Dispatchable;

abstract class TwoFactorAuthenticationEvent
{
    use Dispatchable;

    /**
     * The user instance.
<<<<<<< HEAD
=======
     *
     * @var \App\Models\User
>>>>>>> 59fd8d2c (.)
     */
    public UserContract $user;

    /**
     * Create a new event instance.
     *
<<<<<<< HEAD

=======
     * @param  \App\Models\User  $user
>>>>>>> 59fd8d2c (.)
     * @return void
     */
    public function __construct(UserContract $user)
    {
        $this->user = $user;
    }
}
