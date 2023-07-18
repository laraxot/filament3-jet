<?php

namespace ArtMin96\FilamentJet\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use ArtMin96\FilamentJet\Contracts\TeamInvitationContract;

class TeamInvitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The team invitation instance.
     */
    public TeamInvitationContract $invitation;

    /**
     * Create a new message instance.
     */
    public function __construct(TeamInvitationContract $invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->markdown('filament-jet::mail.team-invitation', ['acceptUrl' => URL::signedRoute('team-invitations.accept', [
            'invitation' => $this->invitation,
        ])])->subject(__('filament-jet::teams/invitation-mail.subject'));
    }
}
