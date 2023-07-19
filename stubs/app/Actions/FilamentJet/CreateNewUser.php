<?php

namespace ArtMin96\FilamentJet\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\User;
>>>>>>> 39fcb522 (rebase)
=======
>>>>>>> 354a30e7 (Fix styling)
use ArtMin96\FilamentJet\Contracts\CreatesNewUsers;
use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Support\Facades\Hash;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): UserContract
    {
        return FilamentJet::userModel()::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
