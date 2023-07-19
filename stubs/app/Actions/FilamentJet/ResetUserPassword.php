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
=======
use Modules\User\Models\User;
>>>>>>> 39fcb522 (rebase)
=======
>>>>>>> 354a30e7 (Fix styling)
=======
=======
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
>>>>>>> 5be9ebe5 (rebase)
=======
=======
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
>>>>>>> e618ae9f (rebase)
=======
>>>>>>> 37a50ce5 (.)
=======
=======
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
>>>>>>> 0b6c922d (rebase)
=======
>>>>>>> ac955b82 (.)
=======
use App\Models\User;
>>>>>>> 7eb101f0 (up)
use ArtMin96\FilamentJet\Contracts\ResetsUserPasswords;
use ArtMin96\FilamentJet\Contracts\UserContract;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetUserPassword implements ResetsUserPasswords
{
    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  array<string, string>  $input
     */
    public function reset(UserContract $user, array $input): void
    {
        if (! method_exists($user, 'forceFill')) {
            throw new \Exception('forceFill method not exists in user');
        }
        $user->forceFill([
            'password' => Hash::make($input['password']),
            'remember_token' => Str::random(60),
        ])->save();
        if (! $user instanceof \Illuminate\Contracts\Auth\Authenticatable) {
            throw new \Exception('user must implements Authenticatable');
        }

        event(new PasswordReset($user));
    }
}
