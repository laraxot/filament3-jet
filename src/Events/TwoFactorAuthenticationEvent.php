<?php

namespace ArtMin96\FilamentJet\Events;

use ArtMin96\FilamentJet\Contracts\UserContract;
use Illuminate\Foundation\Events\Dispatchable;

abstract class TwoFactorAuthenticationEvent
{
    use Dispatchable;

    /**
     * The user instance.
     */
    public UserContract $user;

    /**
     * Create a new event instance.
     *

     * @return void
     */
    public function __construct(UserContract $user)
    {
        $this->user = $user;
    }
}
