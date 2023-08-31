<?php

declare(strict_types=1);

namespace ArtMin96\FilamentJet\Filament\Pages;

use ArtMin96\FilamentJet\Contracts\CreatesTeams;
use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\Http\Livewire\Traits\Properties\HasUserProperty;
use ArtMin96\FilamentJet\Traits\RedirectsActions;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

/**
 * Undocumented class.
 *
 * @property UserContract       $user
 * @property ComponentContainer $form
 */
class CreateTeam extends Page
{
    use HasUserProperty;
    use RedirectsActions;

    protected static string $view = 'filament-jet::filament.pages.create-team';

    public array $createTeamState = [];

    public static function shouldRegisterNavigation(): bool
    {
        if (! is_bool(config('filament-jet.should_register_navigation.create_team'))) {
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        return config('filament-jet.should_register_navigation.create_team');
    }

    /**
     * Create a new team.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function createTeam(CreatesTeams $creator)
    {
        $creator->create($this->user, $this->createTeamState);

        Notification::make()
            ->title(__('filament-jet::teams/create.messages.created'))
            ->success()
            ->send();

        return $this->redirectPath($creator);
    }

    protected function getForms(): array
    {
        return array_merge(
            parent::getForms(),
            [
                'createTeamForm' => $this->makeForm()
                    ->schema([
                        TextInput::make('name')
                            ->label(__('filament-jet::teams/create.fields.team_name'))
                            ->required()
                            ->maxLength(255),
                    ])
                    ->statePath('createTeamState'),
            ]
        );
    }
}
