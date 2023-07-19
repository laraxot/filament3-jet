<?php

namespace ArtMin96\FilamentJet\Contracts;

/**
 * ---
 */
interface UpdatesTeamNames
{
    public function update(UserContract $user, TeamContract $team, array $input): void;
}
