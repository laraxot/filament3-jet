<?php

namespace App\Actions\FilamentJet;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use App\Models\Team;
<<<<<<< HEAD
>>>>>>> eee9f5f (Fix styling)
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
=======
>>>>>>> eee9f5f0 (Fix styling)
use ArtMin96\FilamentJet\Contracts\CreatesTeams;
use ArtMin96\FilamentJet\Events\AddingTeam;
use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Support\Facades\Gate;
use Modules\User\Models\Team;

class CreateTeam implements CreatesTeams
{
    /**
     * Validate and create a new team for the given user.
     *
     * @param  array<string, string>  $input
     */
    public function create(User $user, array $input): Team
    {
        Gate::forUser($user)->authorize('create', FilamentJet::newTeamModel());

        AddingTeam::dispatch($user);

        $user->switchTeam($team = $user->ownedTeams()->create([
            'name' => $input['name'],
            'personal_team' => false,
        ]));

        return $team;
    }
}
