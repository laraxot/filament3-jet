<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

interface CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     */
    public function create(array $input): UserContract;
}
