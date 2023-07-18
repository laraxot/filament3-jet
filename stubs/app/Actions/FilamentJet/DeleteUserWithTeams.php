<?php

namespace App\Actions\FilamentJet;

use ArtMin96\FilamentJet\Contracts\DeletesTeams;
use ArtMin96\FilamentJet\Contracts\DeletesUsers;
use Illuminate\Support\Facades\DB;
use Filament\Models\Contracts\FilamentUser as UserContract;

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
            if(!method_exists($user, 'deleteProfilePhoto')){
                throw new \Exception('['.__LINE__.']['.__FILE__.']');
            }
            if(!method_exists($user, 'delete')){
                throw new \Exception('['.__LINE__.']['.__FILE__.']');
            }
            $this->deleteTeams($user);
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
        if(!method_exists($user, 'teams')){
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $user->teams()->detach();

        $user->ownedTeams->each(function (Team $team) {
            $this->deletesTeams->delete($team);
        });
    }
}
