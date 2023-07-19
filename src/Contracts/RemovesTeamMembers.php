<?php

namespace ArtMin96\FilamentJet\Contracts;

<<<<<<< HEAD
=======
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

>>>>>>> 18d57393 (Fix styling)
/**
 * ---
 */
interface RemovesTeamMembers
{
    public function remove(UserContract $user, TeamContract $team, UserContract $teamMember): void;
}
