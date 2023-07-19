<?php

namespace ArtMin96\FilamentJet\Actions;

use ArtMin96\FilamentJet\Contracts\CreatesTeams;
use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Events\AddingTeam;
use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Support\Facades\Gate;

class CreateTeam implements CreatesTeams
{
    /**
     * Validate and create a new team for the given user.
     *
     * @param  array<string, string>  $input
     */
    public function create(UserContract $user, array $input): TeamContract
    {
        Gate::forUser($user)->authorize('create', FilamentJet::newTeamModel());

        AddingTeam::dispatch($user);

        if (! method_exists($user, 'ownedTeams')) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        if (! method_exists($user, 'switchTeam')) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        $user->switchTeam($team = $user->ownedTeams()->create([
            'name' => $input['name'],
            'personal_team' => false,
        ]));

        if (! $team instanceof TeamContract) {
            throw new \Exception('team not have TeamContract');
        }

        return $team;
    }
}
