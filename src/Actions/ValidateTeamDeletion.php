<?php

namespace ArtMin96\FilamentJet\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\TeamContract;
=======
=======
>>>>>>> c48cfbe5 (.)
=======
>>>>>>> eeea3efa (.)
=======
>>>>>>> 34a1dda4 (.)
=======
>>>>>>> 2093647c (.)
=======
>>>>>>> 03232643 (.)
=======
>>>>>>> fe9c3c3d (.)
=======
>>>>>>> 59fd8d2c (.)
=======
>>>>>>> 51a866c6 (.)
=======
>>>>>>> 6241c56a (.)
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
>>>>>>> 39fcb522 (rebase)
<<<<<<< HEAD
>>>>>>> 080a5a33 (.)
=======
=======
>>>>>>> 354a30e7 (Fix styling)
<<<<<<< HEAD
>>>>>>> c48cfbe5 (.)
=======
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
>>>>>>> 5be9ebe5 (rebase)
<<<<<<< HEAD
>>>>>>> eeea3efa (.)
=======
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
>>>>>>> e618ae9f (rebase)
<<<<<<< HEAD
>>>>>>> 34a1dda4 (.)
=======
=======
>>>>>>> 37a50ce5 (.)
<<<<<<< HEAD
>>>>>>> 2093647c (.)
=======
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
>>>>>>> 0b6c922d (rebase)
<<<<<<< HEAD
>>>>>>> 03232643 (.)
=======
=======
>>>>>>> ff924dba (up)
<<<<<<< HEAD
>>>>>>> fe9c3c3d (.)
=======
=======
use App\Models\Team;
>>>>>>> 7eb101f0 (up)
<<<<<<< HEAD
>>>>>>> 59fd8d2c (.)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 0da7d9b6 (up)
<<<<<<< HEAD
>>>>>>> 51a866c6 (.)
=======
=======
>>>>>>> 5d7a24e9 (Fix styling)
>>>>>>> 6241c56a (.)
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Gate;
use Modules\User\Models\Team;

class ValidateTeamDeletion
{
    /**
     * Validate that the team can be deleted by the given user.
     */
    public function validate(Authenticatable $user, TeamContract $team): void
    {
        Gate::forUser($user)->authorize('delete', $team);

        if ($team->personal_team) {
            Notification::make()
                ->title(__('filament-jet::teams/delete.messages.cannot_delete_personal_team'))
                ->warning()
                ->send();
        }
    }
}
