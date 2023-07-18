<?php

namespace ArtMin96\FilamentJet\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\ComponentContainer;
use ArtMin96\FilamentJet\Contracts\HasTeamsContract;



/**
 * Undocumented class
 * @property HasTeamsContract $user
 * @property ComponentContainer $form
 */
abstract class CardPage extends Page
{
    protected static string $layout = 'filament-jet::components.layouts.card';

    protected function getLayoutData(): array
    {
        return array_merge(
            parent::getLayoutData(),
            [
                'width' => $this->getCardWidth(),
                'hasBrand' => $this->hasBrand(),
                'getHeading' => $this->getHeading(),
                'getSubheading' => $this->getSubheading(),
            ]
        );
    }

    abstract protected function getCardWidth(): string;

    abstract protected function hasBrand(): bool;
}
