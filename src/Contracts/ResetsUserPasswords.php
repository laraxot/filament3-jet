<?php

namespace ArtMin96\FilamentJet\Contracts;


/**
 * ---
 */
interface ResetsUserPasswords
{
    public function reset(UserContract $user, array $input): void;
}
