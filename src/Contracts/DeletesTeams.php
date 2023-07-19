<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;


/**
 * ---
 */
interface DeletesTeams
{
    /**
     * ---
     */
    public function delete(TeamContract $team): void;
}
