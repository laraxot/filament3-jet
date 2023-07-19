<?php

namespace ArtMin96\FilamentJet\Filament\Pages;

use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;
use ArtMin96\FilamentJet\Filament\Traits\HasCachedAction;
use ArtMin96\FilamentJet\FilamentJet;
use ArtMin96\FilamentJet\Http\Livewire\Traits\Properties\HasSanctumPermissionsProperty;
use ArtMin96\FilamentJet\Http\Livewire\Traits\Properties\HasUserProperty;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Collection;

/**
 * Undocumented class
 *
 * @property UserContract $user
 * @property ComponentContainer $form
 * @property Collection $sanctumPermissions
 *
 * @method array getHiddenActions()
 */
class ApiTokens extends Page
{
    use HasCachedAction;
    use HasUserProperty;
    use HasSanctumPermissionsProperty;

    /**
     * The create API token name.
     *
     * @var string
     */
    public $name;

    /**
     * The create API token permissions.
     */
    public array $permissions;

    /**
     * The plain text token value.
     */
    public ?string $plainTextToken = '';

    protected static string $view = 'filament-jet::filament.pages.api-tokens';

    public function mount(): void
    {
        $this->permissions = FilamentJet::$defaultPermissions;
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return config('filament-jet.should_register_navigation.api_tokens');
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label(__('filament-jet::api.fields.token_name'))
                ->required()
                ->maxLength(255),
            CheckboxList::make('permissions')
                ->label(__('filament-jet::api.fields.permissions'))
                ->options($this->sanctumPermissions)
                ->visible(FilamentJet::hasPermissions())
                ->columns(2)
                ->required(),
        ];
    }

    /**
     * Create a new API token.
     */
    public function createApiToken(): void
    {
        $state = $this->form->getState();

        $this->displayTokenValue($this->user->createToken(
            $state['name'],
            FilamentJet::validPermissions($state['permissions'])
        ));

        $this->name = '';
        $this->permissions = FilamentJet::$defaultPermissions;

        $this->emit('tokenCreated');
    }

    /**
     * Undocumented function
     *
     * @param  object  $token
     */
    protected function displayTokenValue($token): void
    {
        $this->plainTextToken = explode('|', $token->plainTextToken, 2)[1];

        $this->dispatchBrowserEvent('open-modal', ['id' => 'showing-token-modal']);
    }
}
