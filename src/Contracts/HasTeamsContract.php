<?php

namespace ArtMin96\FilamentJet\Contracts;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
=======
<<<<<<< HEAD
>>>>>>> 080a5a33 (.)
=======
<<<<<<< HEAD
>>>>>>> c48cfbe5 (.)
=======
<<<<<<< HEAD
>>>>>>> eeea3efa (.)
=======
<<<<<<< HEAD
>>>>>>> 34a1dda4 (.)
=======
<<<<<<< HEAD
>>>>>>> 2093647c (.)
=======
<<<<<<< HEAD
>>>>>>> bcacadb1 (.)
=======
<<<<<<< HEAD
>>>>>>> 03232643 (.)
=======
<<<<<<< HEAD
>>>>>>> 366cf8f9 (.)
interface HasTeamsContract
//extends
//HasApiTokens, //no sanctum ma passport
//PassportHasApiTokensContract,
//HasProfilePhotoContract,
//TwoFactorAuthenticatableContract,
//MustVerifyEmail,
//CanResetPassword,
//ModelContract
{
    /**
     * Determine if the given team is the current team.
<<<<<<< HEAD
=======
     *
     * @param  mixed  $team
=======
interface HasTeamsContract {
    /**
     * Determine if the given team is the current team.
     *
     * @param mixed $team
     *
>>>>>>> 39fcb522 (rebase)
=======
interface HasTeamsContract
{
    /**
     * Determine if the given team is the current team.
     *
     * @param  mixed  $team
>>>>>>> 354a30e7 (Fix styling)
=======
interface HasTeamsContract {
    /**
     * Determine if the given team is the current team.
     *
     * @param mixed $team
     *
>>>>>>> 5be9ebe5 (rebase)
=======
interface HasTeamsContract
{
    /**
     * Determine if the given team is the current team.
     *
     * @param  mixed  $team
>>>>>>> e618ae9f (rebase)
=======
interface HasTeamsContract {
    /**
     * Determine if the given team is the current team.
     *
     * @param mixed $team
     *
>>>>>>> 37a50ce5 (.)
=======
interface HasTeamsContract
{
    /**
     * Determine if the given team is the current team.
     *
     * @param  mixed  $team
>>>>>>> 4bcd417b (Fix styling)
=======
interface HasTeamsContract {
    /**
     * Determine if the given team is the current team.
     *
     * @param mixed $team
     *
>>>>>>> 0b6c922d (rebase)
=======
interface HasTeamsContract
{
    /**
     * Determine if the given team is the current team.
     *
     * @param  mixed  $team
>>>>>>> 0aef54d9 (Fix styling)
     * @return bool
>>>>>>> 080a5a33 (.)
     */
    public function isCurrentTeam(TeamContract $team): bool;

    /**
     * Get the current team of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentTeam();

    /**
     * Switch the user's context to the given team.
<<<<<<< HEAD
=======
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  mixed  $team
=======
     * @param mixed $team
     *
>>>>>>> 39fcb522 (rebase)
=======
     * @param  mixed  $team
>>>>>>> 354a30e7 (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 5be9ebe5 (rebase)
=======
     * @param  mixed  $team
>>>>>>> e618ae9f (rebase)
=======
     * @param mixed $team
     *
>>>>>>> 37a50ce5 (.)
=======
     * @param  mixed  $team
>>>>>>> 4bcd417b (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 0b6c922d (rebase)
=======
     * @param  mixed  $team
>>>>>>> 0aef54d9 (Fix styling)
     * @return bool
>>>>>>> 080a5a33 (.)
     */
    public function switchTeam(TeamContract $team): bool;

    /**
     * Get all of the teams the user owns or belongs to.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allTeams();

    /**
     * Get all of the teams the user owns.
     */
    public function ownedTeams(): HasMany;

    /**
     * Get all of the teams the user belongs to.
     */
    public function teams(): BelongsToMany;

    /**
     * Get the user's "personal" team.
<<<<<<< HEAD
=======
     *
     * @return \App\Models\Team
>>>>>>> 59fd8d2c (.)
     */
    public function personalTeam(): ?TeamContract;

    /**
     * Determine if the user owns the given team.
<<<<<<< HEAD
=======
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  mixed  $team
=======
     * @param mixed $team
     *
>>>>>>> 39fcb522 (rebase)
=======
     * @param  mixed  $team
>>>>>>> 354a30e7 (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 5be9ebe5 (rebase)
=======
     * @param  mixed  $team
>>>>>>> e618ae9f (rebase)
=======
     * @param mixed $team
     *
>>>>>>> 37a50ce5 (.)
=======
     * @param  mixed  $team
>>>>>>> 4bcd417b (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 0b6c922d (rebase)
=======
     * @param  mixed  $team
>>>>>>> 0aef54d9 (Fix styling)
     * @return bool
>>>>>>> 080a5a33 (.)
     */
    public function ownsTeam(TeamContract $team): bool;

    /**
     * Determine if the user belongs to the given team.
<<<<<<< HEAD
=======
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  mixed  $team
=======
     * @param mixed $team
     *
>>>>>>> 39fcb522 (rebase)
=======
     * @param  mixed  $team
>>>>>>> 354a30e7 (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 5be9ebe5 (rebase)
=======
     * @param  mixed  $team
>>>>>>> e618ae9f (rebase)
=======
     * @param mixed $team
     *
>>>>>>> 37a50ce5 (.)
=======
     * @param  mixed  $team
>>>>>>> 4bcd417b (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 0b6c922d (rebase)
=======
     * @param  mixed  $team
>>>>>>> 0aef54d9 (Fix styling)
     * @return bool
>>>>>>> 080a5a33 (.)
     */
    public function belongsToTeam(TeamContract $team): bool;

    /**
     * Get the role that the user has on the team.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> c48cfbe5 (.)
=======
>>>>>>> eeea3efa (.)
=======
>>>>>>> 34a1dda4 (.)
=======
>>>>>>> 2093647c (.)
=======
>>>>>>> bcacadb1 (.)
=======
>>>>>>> 03232643 (.)
=======
>>>>>>> 366cf8f9 (.)
<<<<<<< HEAD
     * @param  mixed  $team
=======
     * @param mixed $team
     *
>>>>>>> 39fcb522 (rebase)
<<<<<<< HEAD
>>>>>>> 080a5a33 (.)
=======
=======
     * @param  mixed  $team
>>>>>>> 354a30e7 (Fix styling)
<<<<<<< HEAD
>>>>>>> c48cfbe5 (.)
=======
=======
     * @param mixed $team
     *
>>>>>>> 5be9ebe5 (rebase)
<<<<<<< HEAD
>>>>>>> eeea3efa (.)
=======
=======
     * @param  mixed  $team
>>>>>>> e618ae9f (rebase)
<<<<<<< HEAD
>>>>>>> 34a1dda4 (.)
=======
=======
     * @param mixed $team
     *
>>>>>>> 37a50ce5 (.)
<<<<<<< HEAD
>>>>>>> 2093647c (.)
=======
=======
     * @param  mixed  $team
>>>>>>> 4bcd417b (Fix styling)
<<<<<<< HEAD
>>>>>>> bcacadb1 (.)
=======
=======
     * @param mixed $team
     *
>>>>>>> 0b6c922d (rebase)
<<<<<<< HEAD
>>>>>>> 03232643 (.)
=======
=======
     * @param  mixed  $team
>>>>>>> 0aef54d9 (Fix styling)
>>>>>>> 366cf8f9 (.)
     * @return \ArtMin96\FilamentJet\Role|null
     */
    public function teamRole(TeamContract $team);

    /**
     * Determine if the user has the given role on the given team.
<<<<<<< HEAD
=======
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  mixed  $team
=======
     * @param mixed $team
     *
>>>>>>> 39fcb522 (rebase)
=======
     * @param  mixed  $team
>>>>>>> 354a30e7 (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 5be9ebe5 (rebase)
=======
     * @param  mixed  $team
>>>>>>> e618ae9f (rebase)
=======
     * @param mixed $team
     *
>>>>>>> 37a50ce5 (.)
=======
     * @param  mixed  $team
>>>>>>> 4bcd417b (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 0b6c922d (rebase)
=======
     * @param  mixed  $team
>>>>>>> 0aef54d9 (Fix styling)
     * @return bool
>>>>>>> 080a5a33 (.)
     */
    public function hasTeamRole(TeamContract $team, string $role): bool;

    /**
     * Get the user's permissions for the given team.
<<<<<<< HEAD
=======
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  mixed  $team
=======
     * @param mixed $team
     *
>>>>>>> 39fcb522 (rebase)
=======
     * @param  mixed  $team
>>>>>>> 354a30e7 (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 5be9ebe5 (rebase)
=======
     * @param  mixed  $team
>>>>>>> e618ae9f (rebase)
=======
     * @param mixed $team
     *
>>>>>>> 37a50ce5 (.)
=======
     * @param  mixed  $team
>>>>>>> 4bcd417b (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 0b6c922d (rebase)
=======
     * @param  mixed  $team
>>>>>>> 0aef54d9 (Fix styling)
     * @return array
>>>>>>> 080a5a33 (.)
     */
    public function teamPermissions(TeamContract $team): array;

    /**
     * Determine if the user has the given permission on the given team.
<<<<<<< HEAD
=======
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  mixed  $team
=======
     * @param mixed $team
     *
>>>>>>> 39fcb522 (rebase)
=======
     * @param  mixed  $team
>>>>>>> 354a30e7 (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 5be9ebe5 (rebase)
=======
     * @param  mixed  $team
>>>>>>> e618ae9f (rebase)
=======
     * @param mixed $team
     *
>>>>>>> 37a50ce5 (.)
=======
     * @param  mixed  $team
>>>>>>> 4bcd417b (Fix styling)
=======
     * @param mixed $team
     *
>>>>>>> 0b6c922d (rebase)
=======
     * @param  mixed  $team
>>>>>>> 0aef54d9 (Fix styling)
     * @return bool
>>>>>>> 080a5a33 (.)
     */
    public function hasTeamPermission(TeamContract $team, string $permission): bool;
}
