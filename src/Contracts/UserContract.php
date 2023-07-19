<?php

namespace ArtMin96\FilamentJet\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use ArtMin96\FilamentJet\Contracts\TeamContract;

/**
 * ArtMin96\FilamentJet\Contracts\UserContract
 *
 * @property int $id
 * @property string $name
 * @property string $two_factor_secret
 * @property TeamContract|null $currentTeam
 * @property Collection $tokens
 * @property \Illuminate\Support\Carbon|null $two_factor_confirmed_at
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
