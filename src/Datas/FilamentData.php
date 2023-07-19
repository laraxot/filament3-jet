<?php
namespace ArtMin96\FilamentJet\Datas;

use Spatie\LaravelData\Data;

class FilamentData extends Data
{
    public string $path;


    public static function make(): self
    {
        $data = config('filament');
        if (! is_array($data)) {
            throw new \Exception('straneg things');
        }

        return self::from($data);
    }
}