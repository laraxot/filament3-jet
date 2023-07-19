<?php

namespace ArtMin96\FilamentJet\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 39fcb522 (rebase)
=======
>>>>>>> 354a30e7 (Fix styling)
=======
=======
>>>>>>> e618ae9f (rebase)
=======
>>>>>>> 0b6c922d (rebase)
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5be9ebe5 (rebase)
=======
=======
>>>>>>> 88c140b (Fix styling)
>>>>>>> e618ae9f (rebase)
=======
>>>>>>> 37a50ce5 (.)
=======
>>>>>>> 0b6c922d (rebase)
=======
>>>>>>> ac955b82 (.)
use ArtMin96\FilamentJet\Contracts\DeletesTeams;
use ArtMin96\FilamentJet\Contracts\DeletesUsers;
use ArtMin96\FilamentJet\Contracts\TeamContract;
// use ArtMin96\FilamentJet\Contracts\UserContract;;
//use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\Contracts\UserContract;
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
            if (! method_exists($user, 'deleteProfilePhoto')) {
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
