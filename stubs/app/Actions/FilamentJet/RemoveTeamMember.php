<?php

namespace ArtMin96\FilamentJet\Actions;

use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;
use ArtMin96\FilamentJet\Contracts\RemovesTeamMembers;
use ArtMin96\FilamentJet\Contracts\TeamContract;
// use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;;
use ArtMin96\FilamentJet\Events\TeamMemberRemoved;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

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
        if (! Gate::forUser($user)->check('removeTeamMember', $team) &&
            $user->id !== $teamMember->id) {
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
