<?php

namespace ArtMin96\FilamentJet\Actions;

use Illuminate\Support\Facades\Gate;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use ArtMin96\FilamentJet\Contracts\TeamContract;


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
