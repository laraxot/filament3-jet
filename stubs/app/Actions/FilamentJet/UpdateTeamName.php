<?php

namespace ArtMin96\FilamentJet\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\TeamContract;
=======
=======
>>>>>>> c48cfbe5 (.)
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
>>>>>>> c48cfbe5 (.)
use ArtMin96\FilamentJet\Contracts\UpdatesTeamNames;
use ArtMin96\FilamentJet\Contracts\UserContract;
use Illuminate\Support\Facades\Gate;

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
