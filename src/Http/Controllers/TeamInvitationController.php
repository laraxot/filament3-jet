<?php

namespace ArtMin96\FilamentJet\Http\Controllers;

use ArtMin96\FilamentJet\Contracts\AddsTeamMembers;
use ArtMin96\FilamentJet\Contracts\TeamInvitationContract;
use ArtMin96\FilamentJet\Datas\FilamentData;
use ArtMin96\FilamentJet\Features;
use ArtMin96\FilamentJet\FilamentJet;
use Exception;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class TeamInvitationController extends Controller
{
    /**
     * Accept a team invitation.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function accept(Request $request, TeamInvitationContract $invitation)
    {
        if (! Features::hasTeamFeatures()) {
            $invitation->delete();

            Notification::make()
                ->title(__('filament-jet::teams/invitations.messages.feature_disabled'))
                ->success()
                ->send();
            $filamentPath = config('filament.path');
            if (! is_string($filamentPath)) {
                throw new Exception('strange things');
            }

            return redirect($filamentPath);
        }

        app(AddsTeamMembers::class)->add(
            $invitation->team->owner,
            $invitation->team,
            $invitation->email,
            $invitation->role
        );

        $invitation->delete();

        $newTeamMember = FilamentJet::findUserByEmailOrFail($invitation->email);

        if (! $newTeamMember->switchTeam($invitation->team)) {
            abort(403);
        }

        Notification::make()
            ->title(__('filament-jet::teams/invitations.messages.invited', ['team' => $invitation->team->name]))
            ->success()
            ->send();
        $filamentData = FilamentData::make();

        return redirect($filamentData->path);
    }

    /**
     * Cancel the given team invitation.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws AuthorizationException
     */
    public function destroy(Request $request, TeamInvitationContract $invitation)
    {
        if (! Gate::forUser($request->user())->check('removeTeamMember', $invitation->team)) {
            throw new AuthorizationException;
        }

        $invitation->delete();

        return back(303);
    }
}
