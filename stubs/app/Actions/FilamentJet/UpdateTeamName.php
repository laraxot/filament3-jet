<?php

namespace App\Actions\FilamentJet;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UpdatesTeamNames;
use Filament\Models\Contracts\FilamentUser as UserContract;
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
