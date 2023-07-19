<?php

namespace ArtMin96\FilamentJet\Contracts;

<<<<<<< HEAD
=======
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;

>>>>>>> 18d57393 (Fix styling)
interface CreatesTeams
{
    public function create(UserContract $user, array $input): TeamContract;
}
