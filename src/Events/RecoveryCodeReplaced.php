<?php

namespace ArtMin96\FilamentJet\Events;

<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\UserContract;
=======
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;
>>>>>>> 18d57393 (Fix styling)
use Illuminate\Queue\SerializesModels;

class RecoveryCodeReplaced
{
    use SerializesModels;

    /**
     * The authenticated user.
     */
    public UserContract $user;

    /**
     * The recovery code.
     */
    public string $code;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(UserContract $user, string $code)
    {
        $this->user = $user;
        $this->code = $code;
    }
}
