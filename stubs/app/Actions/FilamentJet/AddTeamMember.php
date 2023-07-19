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
use ArtMin96\FilamentJet\Contracts\AddsTeamMembers;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\Events\AddingTeamMember;
use ArtMin96\FilamentJet\Events\TeamMemberAdded;
use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Support\Facades\Gate;

class AddTeamMember implements AddsTeamMembers
{
    /**
     * Add a new team member to the given team.
     */
    public function add(UserContract $user, TeamContract $team, string $email, string $role = null): void
    {
        Gate::forUser($user)->authorize('addTeamMember', $team);

        $newTeamMember = FilamentJet::findUserByEmailOrFail($email);

        AddingTeamMember::dispatch($team, $newTeamMember);

        $team->users()->attach(
            $newTeamMember, ['role' => $role]
        );

        TeamMemberAdded::dispatch($team, $newTeamMember);
    }
}
