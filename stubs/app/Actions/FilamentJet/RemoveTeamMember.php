<?php

namespace App\Actions\FilamentJet;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
use ArtMin96\FilamentJet\Contracts\RemovesTeamMembers;
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
    public function remove(User $user, Team $team, User $teamMember): void
    {
        $this->authorize($user, $team, $teamMember);

        $this->ensureUserDoesNotOwnTeam($teamMember, $team);

        $team->removeUser($teamMember);

        TeamMemberRemoved::dispatch($team, $teamMember);
    }

    /**
     * Authorize that the user can remove the team member.
     */
    protected function authorize(User $user, Team $team, User $teamMember): void
    {
        if (! Gate::forUser($user)->check('removeTeamMember', $team) &&
            $user->id !== $teamMember->id) {
            throw new AuthorizationException;
        }
    }

    /**
     * Ensure that the currently authenticated user does not own the team.
     */
    protected function ensureUserDoesNotOwnTeam(User $teamMember, Team $team): void
    {
        if ($teamMember->id === $team->owner->id) {
            throw ValidationException::withMessages([
                'team' => [__('filament-jet::teams/members.messages.cannot_leave_own_team')],
            ])->errorBag('removeTeamMember');
        }
    }
}
