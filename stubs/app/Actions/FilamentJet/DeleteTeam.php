<?php

declare(strict_types=1);

namespace App\Actions\FilamentJet;

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
