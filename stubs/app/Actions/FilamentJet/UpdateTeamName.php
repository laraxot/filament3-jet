<?php

namespace App\Actions\FilamentJet;

use Modules\User\Models\Team;
use Modules\User\Models\User;
use ArtMin96\FilamentJet\Contracts\UpdatesTeamNames;
use Illuminate\Support\Facades\Gate;

class UpdateTeamName implements UpdatesTeamNames
{
    /**
     * Validate and update the given team's name.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, Team $team, array $input): void
    {
        Gate::forUser($user)->authorize('update', $team);

        $team->forceFill([
            'name' => $input['name'],
        ])->save();
    }
}
