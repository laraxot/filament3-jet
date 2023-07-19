<?php

namespace ArtMin96\FilamentJet\Events;

use Illuminate\Foundation\Events\Dispatchable;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;

class TeamMemberRemoved
{
    use Dispatchable;

    /**
     * The team instance.
     *
     */
    public TeamContract $team;

    /**
     * The team member that was removed.
     *
     */
    public UserContract $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TeamContract $team,UserContract $user)
    {
        $this->team = $team;
        $this->user = $user;
    }
}
