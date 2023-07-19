<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;

/**
 * ---
 */
interface UpdatesTeamNames
{
    public function update(UserContract $user, TeamContract $team, array $input): void;
}
