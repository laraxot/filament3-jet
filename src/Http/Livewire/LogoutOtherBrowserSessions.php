<?php

namespace ArtMin96\FilamentJet\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ArtMin96\FilamentJet\Datas\SessionData;

class LogoutOtherBrowserSessions extends Component
{
    protected function getListeners(): array
    {
        return [
            'loggedOut' => '$refresh',
        ];
    }

    public function render(): View
    {
        return view('filament-jet::livewire.logout-other-browser-sessions');
    }

    /**
     * Get the current sessions.
     */
    public function getSessionsProperty(): Collection
    {

        $sessionData=SessionData::make();
        return $sessionData->getSessionsProperty();
    }

    /**
     * Create a new agent instance from the given session.
     *
     * @param  mixed  $session
     * @return \Jenssegers\Agent\Agent
     */
    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }
}