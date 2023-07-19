<?php

namespace App\Policies;

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
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
>>>>>>> 5be9ebe5 (rebase)
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 354a30e7 (Fix styling)
>>>>>>> c48cfbe5 (.)

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
