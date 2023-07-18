<?php

namespace ArtMin96\FilamentJet\Events;

use Illuminate\Foundation\Events\Dispatchable;
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;


class RecoveryCodesGenerated
{
    use Dispatchable;

    /**
     * The user instance.
     *
     * @var UserContract
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  UserContract  $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}