<?php

namespace App\Actions\FilamentJet;

use Modules\User\Models\Team;
use ArtMin96\FilamentJet\Contracts\DeletesTeams;

class DeleteTeam implements DeletesTeams
{
    /**
     * Delete the given team.
     */
    public function delete(Team $team): void
    {
        $team->purge();
    }
}
