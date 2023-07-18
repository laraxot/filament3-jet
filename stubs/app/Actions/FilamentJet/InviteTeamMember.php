<?php

namespace App\Actions\FilamentJet;

<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\InvitesTeamMembers;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Events\InvitingTeamMember;
<<<<<<< HEAD
use ArtMin96\FilamentJet\Mail\TeamInvitation;
=======
use ArtMin96\FilamentJet\Contracts\InvitesTeamMembers;
<<<<<<< HEAD
=======
use ArtMin96\FilamentJet\Contracts\TeamInvitationContract;
>>>>>>> 0a5e9057 (up)
>>>>>>> e362d7c4 (up)
use Filament\Models\Contracts\FilamentUser as UserContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
=======
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use ArtMin96\FilamentJet\Mail\TeamInvitation;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Events\InvitingTeamMember;
use ArtMin96\FilamentJet\Contracts\InvitesTeamMembers;
use ArtMin96\FilamentJet\Contracts\TeamInvitationContract;
use Filament\Models\Contracts\FilamentUser as UserContract;
>>>>>>> 0a5e9057 (up)

class InviteTeamMember implements InvitesTeamMembers
{
    /**
     * Invite a new team member to the given team.
     */
    public function invite(UserContract $user, TeamContract $team, string $email, string $role = null): void
    {
        Gate::forUser($user)->authorize('addTeamMember', $team);

        InvitingTeamMember::dispatch($team, $email, $role);

        $invitation = $team->teamInvitations()->create([
            'email' => $email,
            'role' => $role,
        ]);
        if(!$invitation instanceof TeamInvitationContract){
            throw new \Exception('invitation must implements TeamInvitationContract');
        }

        Mail::to($email)->send(new TeamInvitation($invitation));
    }
}
