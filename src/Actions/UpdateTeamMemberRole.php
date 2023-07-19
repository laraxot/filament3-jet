<?php

namespace ArtMin96\FilamentJet\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;
=======
=======
>>>>>>> c48cfbe5 (.)
=======
>>>>>>> eeea3efa (.)
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
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
>>>>>>> 5be9ebe5 (rebase)
>>>>>>> eeea3efa (.)
use ArtMin96\FilamentJet\Events\TeamMemberUpdated;
use ArtMin96\FilamentJet\FilamentJet;
use ArtMin96\FilamentJet\Rules\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateTeamMemberRole
{
    /**
     * Update the role for the given team member.
     */
    public function update(UserContract $user, TeamContract $team, int $teamMemberId, string $role): void
    {
        Gate::forUser($user)->authorize('updateTeamMember', $team);

        Validator::make([
            'role' => $role,
        ], [
            'role' => ['required', 'string', new Role()],
        ])->validate();

        $team->users()->updateExistingPivot($teamMemberId, [
            'role' => $role,
        ]);

        TeamMemberUpdated::dispatch($team->fresh(), FilamentJet::findUserByIdOrFail($teamMemberId));
    }
}
