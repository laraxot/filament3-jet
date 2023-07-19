<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

/**
 * ---
 */
interface RemovesTeamMembers
{
    public function remove(UserContract $user, TeamContract $team, UserContract $teamMember): void;
}
