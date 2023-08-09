<?php

namespace ArtMin96\FilamentJet\Contracts;

/**
 * ---
 */
interface AddsTeamMembers
{
    public function add(UserContract $user, TeamContract $team, string $email, string $role = null): void;
}
