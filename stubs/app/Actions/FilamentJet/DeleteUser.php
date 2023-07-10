<?php

declare(strict_types=1);

namespace App\Actions\FilamentJet;

use ArtMin96\FilamentJet\Contracts\DeletesUsers;
use Modules\User\Models\User;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
