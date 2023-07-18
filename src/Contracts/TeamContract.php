<?php

namespace ArtMin96\FilamentJet\Contracts;
use Filament\Models\Contracts\FilamentUser as UserContract;

/**
 * ArtMin96\FilamentJet\Contracts\TeamContract
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $personal_team
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\User\Models\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\TeamInvitation> $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePersonalTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUserId($value)
 * @mixin \Eloquent
 */
interface TeamContract
{
    /**
     * Fill the model with an array of attributes. Force mass assignment.
     *
     * @return $this
     */
    public function forceFill(array $attributes);

    /**
     * Save the model to the database.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = []);

     /**
     * Save a new model and return the instance. Allow mass-assignment.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function forceCreate(array $attributes);

    /**
     * Get the owner of the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner();

    /**
     * Get all of the team's users including its owner.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allUsers();

    /**
     * Get all of the users that belong to the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users();

    /**
     * Determine if the given user belongs to the team.
     *
     * @param  UserContract   $user
     * @return bool
     */
    public function hasUser($user);

    /**
     * Determine if the given email address belongs to a user on the team.
     *
     * @return bool
     */
    public function hasUserWithEmail(string $email);

    /**
     * Determine if the given user has the given permission on the team.
     *
     * @param  UserContract   $user
     * @param  string  $permission
     * @return bool
     */
    public function userHasPermission($user, $permission);

    /**
     * Get all of the pending user invitations for the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamInvitations();

    /**
     * Remove the given user from the team.
     *
     * @param  UserContract   $user
     * @return void
     */
    public function removeUser($user);


    /**
     * Purge all of the team's resources.
     *
     * @return void
     */
    public function purge();
}
