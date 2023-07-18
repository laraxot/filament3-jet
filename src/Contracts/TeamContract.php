<?php

namespace ArtMin96\FilamentJet\Contracts;

interface TeamContract
{
    /**
     * Fill the model with an array of attributes. Force mass assignment.
     *
     * @param  array  $attributes
     * @return $this
     */
    public function forceFill(array $attributes);

    public function save(): void;

    public function removeUser(): void;
}
