<?php

namespace ArtMin96\FilamentJet\Contracts;

<<<<<<< HEAD
=======
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

>>>>>>> 18d57393 (Fix styling)
/**
 * ---
 */
interface UpdatesTeamNames
{
    public function update(UserContract $user, TeamContract $team, array $input): void;
}
