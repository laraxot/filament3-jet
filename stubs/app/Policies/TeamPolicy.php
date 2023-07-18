<?php

namespace App\Policies;

<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\TeamContract;
//use Filament\Models\Contracts\FilamentUser as UserContract;
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;
=======
use Modules\User\Models\User;


//use Filament\Models\Contracts\FilamentUser as UserContract;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use Illuminate\Auth\Access\HandlesAuthorization;
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;
>>>>>>> e362d7c4 (up)

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
