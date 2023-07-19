<?php

namespace ArtMin96\FilamentJet\Contracts;

/**
 * ---
 */
interface RemovesTeamMembers
{
    public function remove(UserContract $user, TeamContract $team, UserContract $teamMember): void;
}
