<?php

namespace ArtMin96\FilamentJet\Http\Livewire\Traits\Properties;

use Illuminate\Support\Collection;
use ArtMin96\FilamentJet\FilamentJet;

trait HasSanctumPermissionsProperty
{
    public function getSanctumPermissionsProperty(): Collection
    {
        return collect(FilamentJet::$permissions)
            ->mapWithKeys(function ($permission) {
                return [$permission => $permission];
            });
    }
}
