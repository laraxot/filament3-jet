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
=======
use Modules\User\Models\Team;
>>>>>>> 39fcb522 (rebase)
=======
>>>>>>> 354a30e7 (Fix styling)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
>>>>>>> 5be9ebe5 (rebase)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
>>>>>>> e618ae9f (rebase)
=======
>>>>>>> 37a50ce5 (.)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
>>>>>>> 0b6c922d (rebase)
=======
>>>>>>> ac955b82 (.)
=======
use App\Models\Team;
>>>>>>> 7eb101f0 (up)
=======
use Modules\User\Models\Team;
>>>>>>> 0da7d9b6 (up)
=======
>>>>>>> 5d7a24e9 (Fix styling)
use ArtMin96\FilamentJet\Contracts\CreatesNewUsers;
use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\Features;
use ArtMin96\FilamentJet\FilamentJet;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\Team;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): UserContract
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
                    if (! $user instanceof UserContract) {
                        throw new \Exception('strange things');
                    }
                    $this->createTeam($user);
                }

                return $user;
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(UserContract $user): void
    {
        if (! method_exists($user, 'ownedTeams')) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $teamClass = FilamentJet::teamModel();
        $user->ownedTeams()->save($teamClass::forceCreate([
            'user_id' => $user->getKey(),
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
