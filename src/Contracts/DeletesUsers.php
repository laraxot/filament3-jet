<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;

/**
 * ---
 */
interface DeletesUsers
{
    public function delete(UserContract $user): void;
}
