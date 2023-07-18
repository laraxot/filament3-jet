<?php

namespace ArtMin96\FilamentJet\Http\Livewire;

use ArtMin96\FilamentJet\Events\TeamSwitched;
use ArtMin96\FilamentJet\FilamentJet;
use ArtMin96\FilamentJet\Http\Livewire\Traits\Properties\HasUserProperty;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class SwitchableTeam extends Component
{
    use HasUserProperty;

<<<<<<< HEAD
    public Collection $teams;

    public function mount(): void
    {
        $user = Filament::auth()->user();
        if ($user == null) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->teams = $user->allTeams();
        // $this->teams = Filament::auth()->user()->allTeams();
=======
    public $teams;
    public $user;

    public function mount(): void
    {
        $this->user=Filament::auth()->user();
        $this->teams = $this->user->allTeams();
>>>>>>> e362d7c4 (up)
    }

    /**
     * Update the authenticated user's current team.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function switchTeam(string $teamId)
    {
        $team = FilamentJet::newTeamModel()->findOrFail($teamId);

        if (! $this->user->switchTeam($team)) {
            abort(403);
        }

        TeamSwitched::dispatch($team->fresh(), $this->user);

        Notification::make()
            ->title(__('Team switched'))
            ->success()
            ->send();

        return redirect(config('filament.path'), 303);
    }

    public function render(): View
    {
        return view('filament-jet::components.switchable-team');
    }
}
