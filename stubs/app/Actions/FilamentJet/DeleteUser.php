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
        if(!method_exists($user, 'deleteProfilePhoto')){
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        if(!method_exists($user, 'delete')){
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
