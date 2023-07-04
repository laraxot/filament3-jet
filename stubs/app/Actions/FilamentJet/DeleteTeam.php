<?php

namespace App\Actions\FilamentJet;

<<<<<<< HEAD
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
use ArtMin96\FilamentJet\Contracts\DeletesTeams;
use Modules\User\Models\Team;

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
