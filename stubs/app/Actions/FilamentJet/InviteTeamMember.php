<?php

namespace ArtMin96\FilamentJet\Actions;

<<<<<<< HEAD
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
=======
use App\Models\Team;
use App\Models\User;
>>>>>>> 7eb101f0 (up)
use ArtMin96\FilamentJet\Contracts\InvitesTeamMembers;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\TeamInvitationContract;
use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\Events\InvitingTeamMember;
use ArtMin96\FilamentJet\Mail\TeamInvitation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
        if (! $invitation instanceof TeamInvitationContract) {
            throw new \Exception('invitation must implements TeamInvitationContract');
        }

        Mail::to($email)->send(new TeamInvitation($invitation));
    }
}
