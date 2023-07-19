<?php

namespace ArtMin96\FilamentJet\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use Filament\Facades\Filament;
use ArtMin96\FilamentJet\FilamentJet;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use ArtMin96\FilamentJet\Events\TeamSwitched;
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;
use ArtMin96\FilamentJet\Http\Livewire\Traits\Properties\HasUserProperty;

class SwitchableTeam extends Component
{
    use HasUserProperty;

    public Collection $teams;

    public UserContract $user;

    public function mount(): void
    {
        $user = Filament::auth()->user();
        if (! $user instanceof UserContract) {
            throw new \Exception('['.get_class($user).'] not implements ArtMin96\FilamentJet\Contracts\HasTeamsContract ');
        }
        $this->user=$user;
        $this->teams = $this->user->allTeams();
    }

    /**
     * Update the authenticated user's current team.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function switchTeam(string $teamId)
    {
        $team = FilamentJet::newTeamModel()->findOrFail($teamId);

        if ($this->user == null) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

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
