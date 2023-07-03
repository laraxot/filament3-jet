<?php

namespace App\Actions\FilamentJet;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
use ArtMin96\FilamentJet\Contracts\UpdatesUserPasswords;
use ArtMin96\FilamentJet\Traits\PasswordValidationRules;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Update the user's password.
     */
    public function update(User $user, array $input): void
    {
        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
