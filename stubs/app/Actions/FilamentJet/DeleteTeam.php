<?php

<<<<<<< HEAD
namespace ArtMin96\FilamentJet\Actions;
=======
declare(strict_types=1);

namespace App\Actions\FilamentJet;
>>>>>>> 89797fce (.)

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
>>>>>>> 39fcb522 (rebase)
=======
>>>>>>> 354a30e7 (Fix styling)
use ArtMin96\FilamentJet\Contracts\DeletesTeams;
use ArtMin96\FilamentJet\Contracts\TeamContract;

class DeleteTeam implements DeletesTeams
{
    /**
     * Delete the given team.
     */
    public function delete(TeamContract $team): void
    {
        $team->purge();
    }
}
