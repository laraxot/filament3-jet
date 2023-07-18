<?php

namespace App\Actions\FilamentJet;

use ArtMin96\FilamentJet\Contracts\DeletesUsers;
use Filament\Models\Contracts\FilamentUser as UserContract;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(UserContract $user): void
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
