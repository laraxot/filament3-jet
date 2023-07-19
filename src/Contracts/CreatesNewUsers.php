<?php

namespace ArtMin96\FilamentJet\Contracts;

<<<<<<< HEAD
=======
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

>>>>>>> 18d57393 (Fix styling)
interface CreatesNewUsers
{
    /**
     * Create a newly registered user.
     */
    public function create(array $input): UserContract;
}
