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
>>>>>>> fe76f0bc (.)
=======
>>>>>>> 59fd8d2c (.)
=======
>>>>>>> 51a866c6 (.)
=======
>>>>>>> 6241c56a (.)
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
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
>>>>>>> e618ae9f (rebase)
=======
>>>>>>> 0b6c922d (rebase)
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5be9ebe5 (rebase)
<<<<<<< HEAD
>>>>>>> eeea3efa (.)
=======
=======
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
>>>>>>> 0b6c922d (rebase)
<<<<<<< HEAD
>>>>>>> 03232643 (.)
=======
=======
>>>>>>> ac955b82 (.)
<<<<<<< HEAD
>>>>>>> fe76f0bc (.)
=======
=======
use App\Models\Team;
use App\Models\User;
>>>>>>> 7eb101f0 (up)
<<<<<<< HEAD
>>>>>>> 59fd8d2c (.)
=======
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 0da7d9b6 (up)
<<<<<<< HEAD
>>>>>>> 51a866c6 (.)
=======
=======
>>>>>>> 5d7a24e9 (Fix styling)
>>>>>>> 6241c56a (.)
use ArtMin96\FilamentJet\Contracts\UpdatesTeamNames;
use ArtMin96\FilamentJet\Contracts\UserContract;
use Illuminate\Support\Facades\Gate;
use Modules\User\Models\Team;
use Modules\User\Models\User;

class UpdateTeamName implements UpdatesTeamNames
{
    /**
     * Validate and update the given team's name.
     *
     * @param  array<string, string>  $input
     */
    public function update(UserContract $user, TeamContract $team, array $input): void
    {
        Gate::forUser($user)->authorize('update', $team);

        $team->forceFill([
            'name' => $input['name'],
        ])->save();
    }
}
