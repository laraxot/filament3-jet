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
<<<<<<< HEAD
     * @var \App\Models\User
>>>>>>> 59fd8d2c (.)
=======
     * @var \Modules\User\Models\User
>>>>>>> 51a866c6 (.)
     */
    public UserContract $user;

    /**
     * Create a new event instance.
     *
<<<<<<< HEAD
<<<<<<< HEAD

=======
     * @param  \App\Models\User  $user
>>>>>>> 59fd8d2c (.)
=======
     * @param  \Modules\User\Models\User  $user
>>>>>>> 51a866c6 (.)
     * @return void
     */
    public function __construct(UserContract $user)
    {
        $this->user = $user;
    }
}
