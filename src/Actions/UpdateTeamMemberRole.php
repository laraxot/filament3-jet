<?php

namespace ArtMin96\FilamentJet\Actions;

<<<<<<< HEAD

=======
use Modules\User\Models\User;
>>>>>>> 0a5e9057 (up)
use ArtMin96\FilamentJet\Rules\Role;
use Illuminate\Support\Facades\Gate;
use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Support\Facades\Validator;

use ArtMin96\FilamentJet\Contracts\TeamContract;
<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;
=======
>>>>>>> 0a5e9057 (up)
use ArtMin96\FilamentJet\Events\TeamMemberUpdated;

class UpdateTeamMemberRole
{
    /**
     * Update the role for the given team member.
     */
    public function update(UserContract $user, TeamContract $team, int $teamMemberId, string $role)
    {
        Gate::forUser($user)->authorize('updateTeamMember', $team);

        Validator::make([
            'role' => $role,
        ], [
            'role' => ['required', 'string', new Role],
        ])->validate();

        $team->users()->updateExistingPivot($teamMemberId, [
            'role' => $role,
        ]);

        TeamMemberUpdated::dispatch($team->fresh(), FilamentJet::findUserByIdOrFail($teamMemberId));
    }
}
