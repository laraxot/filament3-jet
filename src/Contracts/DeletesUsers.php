<?php

namespace ArtMin96\FilamentJet\Contracts;

/**
 * ---
 */
interface DeletesUsers
{
    public function delete(UserContract $user): void;
}
