<?php

namespace ArtMin96\FilamentJet\Events;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use Illuminate\Foundation\Events\Dispatchable;

class InvitingTeamMember
{
    use Dispatchable;

    /**
     * The team instance.
     */
    public TeamContract $team;

    /**
     * The email address of the invitee.
     *
     * @var mixed
     */
    public $email;

    /**
     * The role of the invitee.
     *
     * @var mixed
     */
    public $role;

    /**
     * Create a new event instance.
     *
     * @param  mixed  $email
     * @param  mixed  $role
     * @return void
     */
    public function __construct(TeamContract $team, $email, $role)
    {
        $this->team = $team;
        $this->email = $email;
        $this->role = $role;
    }
}
