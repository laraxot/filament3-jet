<?php

namespace ArtMin96\FilamentJet\Contracts;

use ArtMin96\FilamentJet\Role;

/**
 * Undocumented interface
 * @property string $email
 * @property ?string $role
 *
 * @mixin \Eloquent
 */
interface TeamInvitationContract
{
    public function delete();
}
