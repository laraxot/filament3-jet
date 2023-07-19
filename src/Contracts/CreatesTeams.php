<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

interface CreatesTeams
{
    public function create(UserContract $user, array $input): TeamContract;
}
