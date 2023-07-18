<?php

namespace App\Actions\FilamentJet;

use Illuminate\Support\Facades\DB;
use ArtMin96\FilamentJet\Contracts\DeletesTeams;
use ArtMin96\FilamentJet\Contracts\DeletesUsers;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use ArtMin96\FilamentJet\Contracts\TeamContract;
>>>>>>> e362d7c4 (up)
=======
use ArtMin96\FilamentJet\Contracts\TeamContract;
>>>>>>> 0a5e9057 (up)
use Filament\Models\Contracts\FilamentUser as UserContract;
use Illuminate\Support\Facades\DB;

class DeleteUser implements DeletesUsers
{
    /**
     * The team deleter implementation.
     *
     * @var \ArtMin96\FilamentJet\Contracts\DeletesTeams
     */
    protected $deletesTeams;

    /**
     * Create a new action instance.
     */
    public function __construct(DeletesTeams $deletesTeams)
    {
        $this->deletesTeams = $deletesTeams;
    }

    /**
     * Delete the given user.
     */
    public function delete(UserContract $user): void
    {
        DB::transaction(function () use ($user) {
            if (! method_exists($user, 'deleteProfilePhoto')) {
                throw new \Exception('['.__LINE__.']['.__FILE__.']');
            }
            if (! method_exists($user, 'delete')) {
                throw new \Exception('['.__LINE__.']['.__FILE__.']');
            }
            $this->deleteTeams($user);
            if(!method_exists($user,'deleteProfilePhoto')){
                throw new \Exception('method deleteProfilePhoto is missing on user');
            }
            $user->deleteProfilePhoto();
            $user->tokens->each->delete();
            $user->delete();
        });
    }

    /**
     * Delete the teams and team associations attached to the user.
     */
    protected function deleteTeams(UserContract $user): void
    {
        if (! method_exists($user, 'teams')) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $user->teams()->detach();

        $user->ownedTeams->each(function (TeamContract $team) {
            $this->deletesTeams->delete($team);
        });
    }
}
