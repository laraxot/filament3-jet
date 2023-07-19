<?php

<<<<<<< HEAD
<<<<<<< HEAD
namespace ArtMin96\FilamentJet\Actions;
=======
declare(strict_types=1);

=======
>>>>>>> 59fd8d2c (.)
namespace App\Actions\FilamentJet;
>>>>>>> 89797fce (.)

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
>>>>>>> 39fcb522 (rebase)
=======
>>>>>>> 354a30e7 (Fix styling)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
>>>>>>> 5be9ebe5 (rebase)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
>>>>>>> e618ae9f (rebase)
=======
>>>>>>> 37a50ce5 (.)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
>>>>>>> 0b6c922d (rebase)
=======
>>>>>>> ac955b82 (.)
=======
use App\Models\Team;
>>>>>>> 7eb101f0 (up)
=======
use Modules\User\Models\Team;
>>>>>>> 0da7d9b6 (up)
use ArtMin96\FilamentJet\Contracts\DeletesTeams;
<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\TeamContract;
=======
>>>>>>> 59fd8d2c (.)

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
