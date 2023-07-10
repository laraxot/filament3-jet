<?php

namespace ArtMin96\FilamentJet\Actions;

use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Gate;
use Modules\User\Models\Team;

class ValidateTeamDeletion
{
    /**
     * Validate that the team can be deleted by the given user.
     */
    public function validate(Authenticatable $user, Team $team): void
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
