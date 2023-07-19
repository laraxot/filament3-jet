<?php

namespace ArtMin96\FilamentJet\Contracts;


/**
 * ---
 */
interface UpdatesUserPasswords
{
    public function update(UserContract $user, array $input): void;
}
