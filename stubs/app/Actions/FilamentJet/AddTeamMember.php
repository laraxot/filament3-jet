<?php

namespace App\Actions\FilamentJet;

<<<<<<< HEAD
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
use ArtMin96\FilamentJet\Contracts\AddsTeamMembers;
use ArtMin96\FilamentJet\Events\AddingTeamMember;
use ArtMin96\FilamentJet\Events\TeamMemberAdded;
use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Support\Facades\Gate;
use Modules\User\Models\Team;
use Modules\User\Models\User;

class AddTeamMember implements AddsTeamMembers
{
    /**
     * Add a new team member to the given team.
     */
    public function add(User $user, Team $team, string $email, string $role = null): void
    {
        Gate::forUser($user)->authorize('addTeamMember', $team);

        $newTeamMember = FilamentJet::findUserByEmailOrFail($email);

        AddingTeamMember::dispatch($team, $newTeamMember);

        $team->users()->attach(
            $newTeamMember,
            ['role' => $role]
        );

        TeamMemberAdded::dispatch($team, $newTeamMember);
    }
}
