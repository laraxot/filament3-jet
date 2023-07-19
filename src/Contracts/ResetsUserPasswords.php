<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;

/**
 * ---
 */
interface ResetsUserPasswords
{
    public function reset(UserContract $user, array $input): void;
}
