<?php

namespace ArtMin96\FilamentJet\Contracts;

use Laravel\Sanctum\Contracts\HasApiTokens;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;

/**
 * ArtMin96\FilamentJet\Contracts\HasTeamsContract
 *
 * @property int $id
 * @property string $name
 * @property string $two_factor_secret
 * @property TeamContract|null $currentTeam
 * @property Collection $tokens
 * @property \Illuminate\Support\Carbon|null $two_factor_confirmed_at
 * @property int $current_team_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, TeamContract> $ownedTeams
 *
 * @mixin \Eloquent
 */
interface HasTeamsContract extends HasApiTokens,
    HasProfilePhotoContract,
    TwoFactorAuthenticatableContract,
    MustVerifyEmail,
    CanResetPassword,
    ModelContract
{
    /**
     * Determine if the given team is the current team.
     *
     * @param  mixed  $team
     * @return bool
     */
    public function isCurrentTeam($team);

    /**
     * Get the current team of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentTeam();

    /**
     * Switch the user's context to the given team.
     *
     * @param  mixed  $team
     * @return bool
     */
    public function switchTeam($team);

    /**
     * Get all of the teams the user owns or belongs to.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allTeams();

    /**
     * Get all of the teams the user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownedTeams();

    /**
     * Get all of the teams the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams();

    /**
     * Get the user's "personal" team.
     *
     * @return TeamContract
     */
    public function personalTeam();

    /**
     * Determine if the user owns the given team.
     *
     * @param  mixed  $team
     * @return bool
     */
    public function ownsTeam($team);

    /**
     * Determine if the user belongs to the given team.
     *
     * @param  mixed  $team
     * @return bool
     */
    public function belongsToTeam($team);

    /**
     * Get the role that the user has on the team.
     *
     * @param  mixed  $team
     * @return \ArtMin96\FilamentJet\Role|null
     */
    public function teamRole($team);

    /**
     * Determine if the user has the given role on the given team.
     *
     * @param  mixed  $team
     * @return bool
     */
    public function hasTeamRole($team, string $role);

    /**
     * Get the user's permissions for the given team.
     *
     * @param  mixed  $team
     * @return array
     */
    public function teamPermissions($team);

    /**
     * Determine if the user has the given permission on the given team.
     *
     * @param  mixed  $team
     * @return bool
     */
    public function hasTeamPermission($team, string $permission);
}
