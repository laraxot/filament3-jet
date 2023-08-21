<?php

namespace ArtMin96\FilamentJet\Contracts;

/**
 * ---
 */
interface InvitesTeamMembers
{
    public function invite(UserContract $user, TeamContract $team, string $email, string $role = null): void;
}
