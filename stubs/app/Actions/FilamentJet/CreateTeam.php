<?php

<<<<<<< HEAD
namespace ArtMin96\FilamentJet\Actions;
=======
declare(strict_types=1);

namespace App\Actions\FilamentJet;
>>>>>>> 89797fce (.)

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use App\Models\Team;
>>>>>>> d4b8c7b8 (Fix styling)
=======
use Modules\User\Models\Team;
>>>>>>> 39fcb522 (rebase)
=======
>>>>>>> 354a30e7 (Fix styling)
=======
=======
use App\Models\Team;
>>>>>>> eee9f5f (Fix styling)
>>>>>>> 2575a55c (Fix styling)
=======
=======
>>>>>>> e618ae9f (rebase)
=======
use App\Models\Team;
>>>>>>> eee9f5f (Fix styling)
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
<<<<<<< HEAD
>>>>>>> 5be9ebe5 (rebase)
=======
=======
>>>>>>> 88c140b (Fix styling)
>>>>>>> e618ae9f (rebase)
use ArtMin96\FilamentJet\Contracts\CreatesTeams;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;
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
<<<<<<< HEAD
    public function create(UserContract $user, array $input): TeamContract
=======
    public function create(User $user, array $input): Team
>>>>>>> 89797fce (.)
    {
        Gate::forUser($user)->authorize('create', FilamentJet::newTeamModel());

        AddingTeam::dispatch($user);

        if (! method_exists($user, 'ownedTeams')) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        if (! method_exists($user, 'switchTeam')) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        $team = $user->ownedTeams()->create([
            'name' => $input['name'],
            'personal_team' => false,
        ]);
        if (! $team instanceof TeamContract) {
            throw new \Exception('team not have TeamContract');
        }
        $user->switchTeam($team);

        return $team;
    }
}
