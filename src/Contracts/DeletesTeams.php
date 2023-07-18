<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Contracts\TeamContract;

/**
 * ---
 */
interface DeletesTeams
{
    /**
     * ---
     */
    public function delete(TeamContract $team):void;
}
