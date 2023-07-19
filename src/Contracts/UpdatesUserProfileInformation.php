<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;

/**
 * ---
 */
interface UpdatesUserProfileInformation
{
    public function update(UserContract $user, array $input): void;
}
