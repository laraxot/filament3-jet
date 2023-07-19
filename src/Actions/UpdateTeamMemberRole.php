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
use ArtMin96\FilamentJet\Contracts\UserContract;
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
>>>>>>> ff924dba (up)
<<<<<<< HEAD
>>>>>>> fe9c3c3d (.)
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
use ArtMin96\FilamentJet\Events\TeamMemberUpdated;
use ArtMin96\FilamentJet\FilamentJet;
use ArtMin96\FilamentJet\Rules\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Modules\User\Models\Team;
use Modules\User\Models\User;

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
