<?php

<<<<<<< HEAD
<<<<<<< HEAD
namespace ArtMin96\FilamentJet\Actions;
=======
declare(strict_types=1);

=======
>>>>>>> 59fd8d2c (.)
namespace App\Actions\FilamentJet;
>>>>>>> 89797fce (.)

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
>>>>>>> 0b6c922d (rebase)
=======
use App\Models\Team;
>>>>>>> eee9f5f (Fix styling)
>>>>>>> 2575a55c (Fix styling)
=======
=======
<<<<<<< HEAD
>>>>>>> e618ae9f (rebase)
=======
use App\Models\Team;
<<<<<<< HEAD
>>>>>>> eee9f5f (Fix styling)
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
<<<<<<< HEAD
>>>>>>> 5be9ebe5 (rebase)
=======
=======
>>>>>>> 88c140b (Fix styling)
<<<<<<< HEAD
>>>>>>> e618ae9f (rebase)
=======
=======
>>>>>>> eee9f5f0 (Fix styling)
>>>>>>> 0179c242 (.)
=======
>>>>>>> 37a50ce5 (.)
=======
=======
use App\Models\Team;
>>>>>>> eee9f5f (Fix styling)
>>>>>>> 240b1da8 (Fix styling)
=======
>>>>>>> 88c140b66a53d800c69d87cc2e1415ead5c1ea19
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
>>>>>>> 0b6c922d (rebase)
=======
>>>>>>> ac955b82 (.)
=======
use App\Models\Team;
<<<<<<< HEAD
use App\Models\User;
>>>>>>> 7eb101f0 (up)
=======
>>>>>>> 805c032a (Fix styling)
=======
use Modules\User\Models\Team;
>>>>>>> 0da7d9b6 (up)
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
<<<<<<< HEAD
    public function create(UserContract $user, array $input): TeamContract
=======
    public function create(User $user, array $input): Team
>>>>>>> 89797fce (.)
=======
    public function create(\Filament\Models\Contracts\FilamentUser $user, array $input): Team
>>>>>>> 59fd8d2c (.)
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
