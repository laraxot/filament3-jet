<?php

namespace ArtMin96\FilamentJet\Contracts;

interface CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     * @return \Illuminate\Foundation\Auth\User
     */
    public function create(array $input);
}
