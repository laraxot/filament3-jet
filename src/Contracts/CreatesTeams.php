<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;

/**
 *
 */
interface CreatesTeams
{
    public function create(UserContract $user, array $input): TeamContract;
}
