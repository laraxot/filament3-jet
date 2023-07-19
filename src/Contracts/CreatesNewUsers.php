<?php

namespace ArtMin96\FilamentJet\Contracts;


interface CreatesNewUsers
{
    /**
     * Create a newly registered user.
     */
    public function create(array $input): UserContract;
}
