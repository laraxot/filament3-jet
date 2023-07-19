<?php

namespace ArtMin96\FilamentJet\Events;

use Illuminate\Queue\SerializesModels;
use ArtMin96\FilamentJet\Contracts\UserContract;

class RecoveryCodeReplaced
{
    use SerializesModels;

    /**
     * The authenticated user.
     *
     */
    public UserContract $user;

    /**
     * The recovery code.
     *
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
