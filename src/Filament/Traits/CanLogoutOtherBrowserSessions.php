<?php

namespace ArtMin96\FilamentJet\Filament\Traits;

use ArtMin96\FilamentJet\Datas\SessionData;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

trait CanLogoutOtherBrowserSessions
{
    /**
     * Log out from other browser sessions.
     *
     * @return void
     */
    public function logoutOtherBrowserSessions()
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        Auth::logoutOtherDevices('password');

        $this->deleteOtherSessionRecords();

        request()->session()->put([
            'password_hash_'.Auth::getDefaultDriver() => Auth::user()?->getAuthPassword(),
        ]);

        $this->emit('loggedOut');

        Notification::make()
            ->title(__('filament-jet::account/browser-sessions.messages.cleared'))
            ->success()
            ->send();
    }

    /**
     * Delete the other browser session records from storage.
     *
     * @return void
     */
    protected function deleteOtherSessionRecords()
    {
        $sessionData = SessionData::make();
        $sessionData->deleteOtherSessionRecords();
    }
}
