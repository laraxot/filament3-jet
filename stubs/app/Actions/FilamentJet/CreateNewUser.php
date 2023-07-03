<?php

namespace App\Actions\FilamentJet;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
use ArtMin96\FilamentJet\Contracts\CreatesNewUsers;
use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        return FilamentJet::userModel()::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
