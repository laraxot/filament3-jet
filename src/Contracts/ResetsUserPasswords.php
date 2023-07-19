<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

/**
 * ---
 */
interface ResetsUserPasswords
{
    public function reset(UserContract $user, array $input): void;
}
