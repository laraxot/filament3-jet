<?php

namespace ArtMin96\FilamentJet\Contracts;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

/**
 * ArtMin96\FilamentJet\Contracts\UserContract
 *
 * @property int $id
 * @property string $name
 * @property string $two_factor_secret
 * @property TeamContract $membership
 * @property TeamContract|null $currentTeam
 * @property Collection $tokens
 * @property Carbon|null $two_factor_confirmed_at
 * @property int $current_team_id
 * @property-read EloquentCollection<int, TeamContract> $ownedTeams
 *
 * @mixin \Eloquent
 */
interface UserContract extends
    //HasApiTokens, //no sanctum ma passport
    HasTeamsContract,
    PassportHasApiTokensContract,
    HasProfilePhotoContract,
    TwoFactorAuthenticatableContract,
    MustVerifyEmail,
    CanResetPassword,
    ModelContract
{

}
