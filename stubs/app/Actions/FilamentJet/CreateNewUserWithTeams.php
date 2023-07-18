<?php

namespace App\Actions\FilamentJet;

<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\CreatesNewUsers;
=======
use Exception;

<<<<<<< HEAD
>>>>>>> e362d7c4 (up)
=======
>>>>>>> 0a5e9057 (up)
use ArtMin96\FilamentJet\Features;
use ArtMin96\FilamentJet\FilamentJet;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
use Modules\User\Models\Team;
=======
use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\CreatesNewUsers;
>>>>>>> e362d7c4 (up)

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): Model|Authenticatable
    {
        return DB::transaction(function () use ($input) {
            return tap(FilamentJet::userModel()::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function ($user) {

                if (Features::enabled(Features::emailVerification())) {
                    app()->bind(
                        \Illuminate\Auth\Listeners\SendEmailVerificationNotification::class,
                        \ArtMin96\FilamentJet\Listeners\Auth\SendEmailVerificationNotification::class,
                    );
                }
                if (! $user instanceof \Illuminate\Contracts\Auth\Authenticatable) {
                    throw new Exception('user must implements Authenticatable');
                }

                event(new Registered($user));

                if (Features::hasTeamFeatures()) {
                    $this->createTeam($user);
                }

                return $user;
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(Model|Authenticatable $user): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (! method_exists($user, 'ownedTeams')) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $user->ownedTeams()->save(Team::forceCreate([
=======
        $teamClass=FilamentJet::teamModel();
        $user->ownedTeams()->save($teamClass::forceCreate([
>>>>>>> e362d7c4 (up)
=======
        $teamClass=FilamentJet::teamModel();
        $user->ownedTeams()->save($teamClass::forceCreate([
>>>>>>> 0a5e9057 (up)
            'user_id' => $user->getKey(),
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
