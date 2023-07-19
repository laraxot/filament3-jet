<?php

declare(strict_types=1);

namespace ArtMin96\FilamentJet\Actions;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\Events\TeamMemberUpdated;
use ArtMin96\FilamentJet\FilamentJet;
use ArtMin96\FilamentJet\Rules\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Modules\User\Models\Team;

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
