<?php

namespace App\Policies;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\UserContract;
=======
=======
>>>>>>> c48cfbe5 (.)
=======
>>>>>>> eeea3efa (.)
=======
>>>>>>> 34a1dda4 (.)
=======
>>>>>>> 2093647c (.)
=======
>>>>>>> 03232643 (.)
=======
>>>>>>> fe76f0bc (.)
=======
>>>>>>> 59fd8d2c (.)
=======
>>>>>>> 51a866c6 (.)
=======
>>>>>>> 6241c56a (.)
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 39fcb522 (rebase)
>>>>>>> 080a5a33 (.)
use Illuminate\Auth\Access\HandlesAuthorization;
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
=======
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
>>>>>>> 5be9ebe5 (rebase)
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\Team;
use Modules\User\Models\User;
<<<<<<< HEAD
>>>>>>> 354a30e7 (Fix styling)
<<<<<<< HEAD
>>>>>>> c48cfbe5 (.)
=======
=======
=======
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 88c140b (Fix styling)
>>>>>>> e618ae9f (rebase)
<<<<<<< HEAD
>>>>>>> 34a1dda4 (.)
=======
=======
=======
>>>>>>> 0b6c922d (rebase)
=======
>>>>>>> ac955b82 (.)
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 37a50ce5 (.)
<<<<<<< HEAD
>>>>>>> 2093647c (.)
=======
=======
use App\Models\Team;
use App\Models\User;
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 0da7d9b6 (up)
use Illuminate\Auth\Access\HandlesAuthorization;
>>>>>>> 7eb101f0 (up)
<<<<<<< HEAD
>>>>>>> 59fd8d2c (.)
=======
=======
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 5d7a24e9 (Fix styling)
>>>>>>> 6241c56a (.)

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, TeamContract $team): bool
    {
        return $user->belongsToTeam($team);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, TeamContract $team): bool
    {
        return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can add team members.
     */
    public function addTeamMember(UserContract $user, TeamContract $team): bool
    {
        return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can update team member permissions.
     */
    public function updateTeamMember(UserContract $user, TeamContract $team): bool
    {
        return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can remove team members.
     */
    public function removeTeamMember(UserContract $user, TeamContract $team): bool
    {
        return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, TeamContract $team): bool
    {
        return $user->ownsTeam($team);
    }
}
