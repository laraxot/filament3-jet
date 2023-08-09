<?php

namespace ArtMin96\FilamentJet\Actions;

use ArtMin96\FilamentJet\Contracts\UpdatesUserProfileInformation;
use ArtMin96\FilamentJet\Contracts\UserContract;
use ArtMin96\FilamentJet\Features;
use ArtMin96\FilamentJet\FilamentJet;
use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(UserContract $user, array $input): void
    {
        if (Features::managesProfilePhotos()) {
            if (! method_exists($user, 'updateProfilePhoto')) {
                throw new Exception('method updateProfilePhoto not exists in user');
            }
            $user->updateProfilePhoto($input['profile_photo_path']);
        }

        if ($input[FilamentJet::email()] !== $user->{FilamentJet::email()} &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                FilamentJet::username() => $input[FilamentJet::username()],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(UserContract $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            FilamentJet::email() => $input[FilamentJet::email()],
            FilamentJet::email().'_verified_at' => null,
        ])->save();

        app()->bind(
            \Illuminate\Auth\Listeners\SendEmailVerificationNotification::class,
            \ArtMin96\FilamentJet\Listeners\Auth\SendEmailVerificationNotification::class,
        );
    }
}
