<?php

namespace App\Actions\FilamentJet;

<<<<<<< HEAD
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> 798d2d5 (.)
use ArtMin96\FilamentJet\Contracts\InvitesTeamMembers;
use ArtMin96\FilamentJet\Events\InvitingTeamMember;
use ArtMin96\FilamentJet\Mail\TeamInvitation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Modules\User\Models\Team;
use Modules\User\Models\User;

class InviteTeamMember implements InvitesTeamMembers
{
    /**
     * Invite a new team member to the given team.
     */
    public function invite(User $user, Team $team, string $email, string $role = null): void
    {
        Gate::forUser($user)->authorize('addTeamMember', $team);

        InvitingTeamMember::dispatch($team, $email, $role);

        $invitation = $team->teamInvitations()->create([
            'email' => $email,
            'role' => $role,
        ]);

        Mail::to($email)->send(new TeamInvitation($invitation));
    }
}
