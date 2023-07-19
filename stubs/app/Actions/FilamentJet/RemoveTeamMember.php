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
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 39fcb522 (rebase)
=======
>>>>>>> 354a30e7 (Fix styling)
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
=======
=======
>>>>>>> 88c140b (Fix styling)
>>>>>>> e618ae9f (rebase)
=======
>>>>>>> 37a50ce5 (.)
=======
>>>>>>> 0b6c922d (rebase)
=======
>>>>>>> ac955b82 (.)
=======
use App\Models\Team;
use App\Models\User;
>>>>>>> 7eb101f0 (up)
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 0da7d9b6 (up)
=======
>>>>>>> 5d7a24e9 (Fix styling)
use ArtMin96\FilamentJet\Contracts\RemovesTeamMembers;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;
// use ArtMin96\FilamentJet\Contracts\UserContract;;
use ArtMin96\FilamentJet\Events\TeamMemberRemoved;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;
use Modules\User\Models\Team;
use Modules\User\Models\User;

class RemoveTeamMember implements RemovesTeamMembers
{
    /**
     * Remove the team member from the given team.
     */
    public function remove(UserContract $user, TeamContract $team, UserContract $teamMember): void
    {
        $this->authorize($user, $team, $teamMember);

        $this->ensureUserDoesNotOwnTeam($teamMember, $team);

        $team->removeUser($teamMember);

        TeamMemberRemoved::dispatch($team, $teamMember);
    }

    /**
     * Authorize that the user can remove the team member.
     */
    protected function authorize(UserContract $user, TeamContract $team, UserContract $teamMember): void
    {
<<<<<<< HEAD
        if (
<<<<<<< HEAD
<<<<<<< HEAD
            ! Gate::forUser($user)->check('removeTeamMember', $team) &&
=======
            !Gate::forUser($user)->check('removeTeamMember', $team) &&
>>>>>>> 37a50ce5 (.)
=======
            ! Gate::forUser($user)->check('removeTeamMember', $team) &&
>>>>>>> 4bcd417b (Fix styling)
            $user->id !== $teamMember->id
        ) {
=======
        if (! Gate::forUser($user)->check('removeTeamMember', $team) &&
            $user->id !== $teamMember->id) {
>>>>>>> 7eb101f0 (up)
            throw new AuthorizationException;
        }
    }

    /**
     * Ensure that the currently authenticated user does not own the team.
     */
    protected function ensureUserDoesNotOwnTeam(UserContract $teamMember, TeamContract $team): void
    {
        if ($teamMember->id === $team->owner?->id) {
            throw ValidationException::withMessages([
                'team' => [__('filament-jet::teams/members.messages.cannot_leave_own_team')],
            ])->errorBag('removeTeamMember');
        }
    }
}
