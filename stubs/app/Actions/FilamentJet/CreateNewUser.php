<?php

namespace App\Actions\FilamentJet;

use ArtMin96\FilamentJet\Contracts\CreatesNewUsers;
use ArtMin96\FilamentJet\FilamentJet;
use Filament\Models\Contracts\FilamentUser as UserContract;
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
