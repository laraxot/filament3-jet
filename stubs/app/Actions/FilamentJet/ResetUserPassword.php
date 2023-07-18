<?php

namespace App\Actions\FilamentJet;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\Authenticatable;
use ArtMin96\FilamentJet\Contracts\ResetsUserPasswords;
use Filament\Models\Contracts\FilamentUser as UserContract;

class ResetUserPassword implements ResetsUserPasswords
{
    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  array<string, string>  $input
     */
    public function reset(Authenticatable $user, array $input): void
    {
        if(!method_exists($user,'forceFill')){
            throw new \Exception('forceFill method not exists in user');
        }
        $user->forceFill([
            'password' => Hash::make($input['password']),
            'remember_token' => Str::random(60),
        ])->save();

        event(new PasswordReset($user));
    }
}
