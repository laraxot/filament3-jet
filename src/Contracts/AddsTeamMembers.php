<?php

namespace ArtMin96\FilamentJet\Contracts;

<<<<<<< HEAD
=======
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

>>>>>>> 18d57393 (Fix styling)
/**
 * ---
 */
interface AddsTeamMembers
{
    public function add(UserContract $user, TeamContract $team, string $email, string $role = null): void;
}
