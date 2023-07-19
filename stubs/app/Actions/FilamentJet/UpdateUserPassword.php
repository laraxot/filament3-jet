<?php

namespace ArtMin96\FilamentJet\Actions;

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
use ArtMin96\FilamentJet\Contracts\UpdatesUserPasswords;
use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\Traits\PasswordValidationRules;
use Illuminate\Support\Facades\Hash;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Update the user's password.
     */
    public function update(UserContract $user, array $input): void
    {
        if (! method_exists($user, 'forceFill')) {
            throw new \Exception('forceFill method not exists in user');
        }
        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
