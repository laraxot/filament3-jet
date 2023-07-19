<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

/**
 * ---
 */
interface DeletesUsers
{
    public function delete(UserContract $user): void;
}
