<?php

// namespace Filament\Models\Contracts;

namespace ArtMin96\FilamentJet\Models\Contracts;

/**
 * @property int $id
 */
interface FilamentUser
{
    public function canAccessFilament(): bool;
}
