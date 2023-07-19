<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

/**
 * ---
 */
interface UpdatesTeamNames
{
    public function update(UserContract $user, TeamContract $team, array $input): void;
}
