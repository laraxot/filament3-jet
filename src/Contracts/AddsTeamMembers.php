<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

/**
 * ---
 */
interface AddsTeamMembers
{
    public function add(UserContract $user, TeamContract $team, string $email, string $role = null): void;
}
