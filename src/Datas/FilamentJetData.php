<?php

namespace ArtMin96\FilamentJet\Datas;

use Spatie\LaravelData\Data;

class FilamentJetData extends Data
{
    public ShouldRegisterNavigationData $should_register_navigation;

    public string $passwords;

    public static function make(): self
    {
        $data = config('filament-jet');
        if (! is_array($data)) {
            throw new \Exception('straneg things');
        }

        return self::from($data);
    }
}
