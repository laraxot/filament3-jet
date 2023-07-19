<?php

namespace ArtMin96\FilamentJet;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use ArtMin96\FilamentJet\Traits\HasTeams;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use ArtMin96\FilamentJet\Contracts\CreatesTeams;
use ArtMin96\FilamentJet\Contracts\DeletesTeams;
use ArtMin96\FilamentJet\Contracts\DeletesUsers;
use ArtMin96\FilamentJet\Contracts\TeamContract;
use ArtMin96\FilamentJet\Contracts\AddsTeamMembers;
use ArtMin96\FilamentJet\Contracts\CreatesNewUsers;
use ArtMin96\FilamentJet\Contracts\UpdatesTeamNames;
use ArtMin96\FilamentJet\Contracts\InvitesTeamMembers;
use ArtMin96\FilamentJet\Contracts\RemovesTeamMembers;
use ArtMin96\FilamentJet\Contracts\ResetsUserPasswords;
use ArtMin96\FilamentJet\Contracts\UpdatesUserPasswords;
use ArtMin96\FilamentJet\Contracts\UpdatesUserProfileInformation;
use ArtMin96\FilamentJet\Contracts\UserContract;

final class FilamentJet
{
    /**
     * The callback that is responsible for building the authentication pipeline array, if applicable.
     *
     * @var callable|null
     */
    public static $authenticateThroughCallback;

    /**
     * The roles that are available to assign to users.
     *
     * @var array
     */
    public static $roles = [];

    /**
     * The permissions that exist within the application.
     *
     * @var array
     */
    public static $permissions = [];

    /**
     * The default permissions that should be available to new entities.
     *
     * @var array
     */
    public static $defaultPermissions = [];

    /**
     * The user model that should be used by FilamentJet.
     *
     * @var string
     */
    public static $userModel = 'Modules\\User\\Models\\User';

    /**
     * The team model that should be used by FilamentJet.
     *
     * @var string
     */
    public static $teamModel = 'Modules\\User\\Models\\Team';

    /**
     * The membership model that should be used by FilamentJet.
     *
     * @var string
     */
    public static $membershipModel = 'Modules\\User\\Models\\Membership';

    /**
     * The team invitation model that should be used by FilamentJet.
     *
     * @var string
     */
    public static $teamInvitationModel = 'Modules\\User\\Models\\TeamInvitation';

    /**
     * The password rules that should be used by FilamentJet.
     */
    public static array $passwordRules = [];

    /**
     * Register a callback that is responsible for building the authentication pipeline array.
     */
    public static function loginThrough(callable $callback): void
    {
        self::authenticateThrough($callback);
    }

    /**
     * Register a callback that is responsible for building the authentication pipeline array.
     */
    public static function authenticateThrough(callable $callback): void
    {
        self::$authenticateThroughCallback = $callback;
    }

    /**
     * Get the username used for authentication.
     *
     * @return string
     */
    public static function username()
    {
        return config('filament-jet.username', 'email');
    }

    /**
     * Get the name of the email address request variable / field.
     *
     * @return string
     */
    public static function email()
    {
        return config('filament-jet.email', 'email');
    }

    /**
     * Determine if FilamentJet has registered roles.
     *
     * @return bool
     */
    public static function hasRoles()
    {
        return count(self::$roles) > 0;
    }

    /**
     * Find the role with the given key.
     *
     * @return \ArtMin96\FilamentJet\Role
     */
    public static function findRole(string $key)
    {
        return self::$roles[$key] ?? null;
    }

    /**
     * Define a role.
     *
     * @return \ArtMin96\FilamentJet\Role
     */
    public static function role(string $key, string $name, array $permissions)
    {
        self::$permissions = collect(array_merge(self::$permissions, $permissions))
            ->unique()
            ->sort()
            ->values()
            ->all();

        return tap(new Role($key, $name, $permissions), function ($role) use ($key) {
            static::$roles[$key] = $role;
        });
    }

    /**
     * Determine if any permissions have been registered with FilamentJet.
     *
     * @return bool
     */
    public static function hasPermissions()
    {
        return count(self::$permissions) > 0;
    }

    /**
     * Define the available API token permissions.
     *
     * @return static
     */
    public static function permissions(array $permissions)
    {
        self::$permissions = $permissions;

        return new self();
    }

    /**
     * Define the default permissions that should be available to new API tokens.
     *
     * @return static
     */
    public static function defaultApiTokenPermissions(array $permissions)
    {
        self::$defaultPermissions = $permissions;

        return new self();
    }

    /**
     * Return the permissions in the given list that are actually defined permissions for the application.
     *
     * @return array
     */
    public static function validPermissions(array $permissions)
    {
        return array_values(array_intersect($permissions, self::$permissions));
    }

    /**
     * Determine if FilamentJet is managing profile photos.
     *
     * @return bool
     */
    public static function managesProfilePhotos()
    {
        return Features::managesProfilePhotos();
    }

    /**
     * Determine if FilamentJet is supporting API features.
     *
     * @return bool
     */
    public static function hasApiFeatures()
    {
        return Features::hasApiFeatures();
    }

    /**
     * Determine if FilamentJet is supporting team features.
     *
     */
    public static function hasTeamFeatures(): bool
    {
        return Features::hasTeamFeatures();
    }

    /**
     * Determine if a given user model utilizes the "HasTeams" trait.
     *
     */
    public static function userHasTeamFeatures(UserContract $user): bool
    {
        return (array_key_exists(HasTeams::class, class_uses_recursive($user)) ||
                method_exists($user, 'currentTeam')) &&
            self::hasTeamFeatures();
    }

    /**
     * Determine if the application is using the terms confirmation feature.
     *
     * @return bool
     */
    public static function hasTermsAndPrivacyPolicyFeature()
    {
        return Features::hasTermsAndPrivacyPolicyFeature();
    }

    /**
     * Determine if the application is using any account deletion features.
     *
     * @return bool
     */
    public static function hasAccountDeletionFeatures()
    {
        return Features::hasAccountDeletionFeatures();
    }

    /**
     * Determine registration page.
     *
     * @return bool
     */
    public static function registrationPage()
    {
        return Features::getOption(Features::registration(), 'page');
    }

    /**
     * Determine email verification component.
     *
     * @return bool
     */
    public static function emailVerificationComponent()
    {
        return Features::getOption(Features::emailVerification(), 'page');
    }

    /**
     * Determine email verification controller.
     *
     * @return bool
     */
    public static function emailVerificationController()
    {
        return Features::getOption(Features::emailVerification(), 'controller');
    }

    /**
     * Determine terms of service component.
     *
     * @return bool
     */
    public static function termsOfServiceComponent()
    {
        return Features::getOption(Features::registration(), 'terms_of_service');
    }

    /**
     * Determine privacy policy component.
     *
     * @return bool
     */
    public static function privacyPolicyComponent()
    {
        return Features::getOption(Features::registration(), 'privacy_policy');
    }

    /**
     * Determine password reset component.
     *
     * @return bool
     */
    public static function resetPasswordPage()
    {
        return Features::getOption(Features::resetPasswords(), 'component');
    }

    /**
     * Determine team invitation controller.
     *
     * @return bool
     */
    public static function teamInvitationController()
    {
        return Features::getOption(Features::teams(), 'invitation.controller');
    }

    /**
     * Determine team invitation accept action.
     *
     * @return bool
     */
    public static function teamInvitationAcceptAction()
    {
        return Features::getOption(Features::teams(), 'invitation.actions.accept');
    }

    /**
     * Determine team invitation destroy action.
     *
     * @return bool
     */
    public static function teamInvitationDestroyAction()
    {
        return Features::getOption(Features::teams(), 'invitation.actions.destroy');
    }

    /**
     * Find a user instance by the given ID.
     *
     * @param  int  $id
     * @return mixed
     */
    public static function findUserByIdOrFail($id)
    {
        return self::newUserModel()->where('id', $id)->firstOrFail();
    }

    /**
     * Find a user instance by the given email address or fail.
     *
     * @return mixed
     */
    public static function findUserByEmailOrFail(string $email)
    {
        return self::newUserModel()->where('email', $email)->firstOrFail();
    }

    /**
     * Get the name of the user model used by the application.
     *
     * @return string
     */
    public static function userModel()
    {
        return self::$userModel;
    }

    /**
     * Get a new instance of the user model.
     *
     * @return mixed
     */
    public static function newUserModel()
    {
        $model = self::userModel();

        return new $model();
    }

    /**
     * Specify the user model that should be used by FilamentJet.
     *
     * @return static
     */
    public static function useUserModel(string $model)
    {
        self::$userModel = $model;

        return new self();
    }

    /**
     * Get the name of the team model used by the application.
     *
     * @return string
     */
    public static function teamModel()
    {
        // return static::$teamModel;
        return config('filament-jet.models.team');
    }

    /**
     * Get a new instance of the team model.
     *
     * @return mixed
     */
    public static function newTeamModel()
    {
        $model = self::teamModel();

        return new $model();
    }

    /**
     * Specify the team model that should be used by FilamentJet.
     *
     * @return static
     */
    public static function useTeamModel(string $model)
    {
        self::$teamModel = $model;

        return new self();
    }

    /**
     * Get the name of the membership model used by the application.
     *
     * @return string
     */
    public static function membershipModel()
    {
        return self::$membershipModel;
    }

    /**
     * Specify the membership model that should be used by FilamentJet.
     *
     * @return static
     */
    public static function useMembershipModel(string $model)
    {
        self::$membershipModel = $model;

        return new self();
    }

    /**
     * Get the name of the team invitation model used by the application.
     *
     * @return string
     */
    public static function teamInvitationModel()
    {
        // return static::$teamInvitationModel;
        return config('filament-jet.models.team_invitation');
    }

    /**
     * Specify the team invitation model that should be used by FilamentJet.
     *
     * @return static
     */
    public static function useTeamInvitationModel(string $model)
    {
        self::$teamInvitationModel = $model;

        return new self();
    }

    /**
     * Register a class / callback that should be used to update user profile information.
     *
     * @return void
     */
    public static function updateUserProfileInformationUsing(string $class)
    {
        app()->singleton(UpdatesUserProfileInformation::class, $class);
    }

    /**
     * Register a class / callback that should be used to update user passwords.
     *
     * @return void
     */
    public static function updateUserPasswordsUsing(string $class)
    {
        app()->singleton(UpdatesUserPasswords::class, $class);
    }

    /**
     * Register a class / callback that should be used to create users.
     *

     */
    public static function createUsersUsing(string $class): void
    {
        app()->singleton(CreatesNewUsers::class, $class);
    }

    /**
     * Register a class / callback that should be used to create teams.
     *

     */
    public static function createTeamsUsing(string $class): void
    {
        app()->singleton(CreatesTeams::class, $class);
    }

    /**
     * Register a class / callback that should be used to update team names.
     *

     */
    public static function updateTeamNamesUsing(string $class): void
    {
        app()->singleton(UpdatesTeamNames::class, $class);
    }

    /**
     * Register a class / callback that should be used to add team members.
     *

     */
    public static function addTeamMembersUsing(string $class): void
    {
        app()->singleton(AddsTeamMembers::class, $class);
    }

    /**
     * Register a class / callback that should be used to add team members.
     *

     */
    public static function inviteTeamMembersUsing(string $class): void
    {
        app()->singleton(InvitesTeamMembers::class, $class);
    }

    /**
     * Register a class / callback that should be used to remove team members.
     *
     * @return void
     */
    public static function removeTeamMembersUsing(string $class): void
    {
        app()->singleton(RemovesTeamMembers::class, $class);
    }

    /**
     * Register a class / callback that should be used to delete teams.
     *
     * @return void
     */
    public static function deleteTeamsUsing(string $class): void
    {
        app()->singleton(DeletesTeams::class, $class);
    }

    /**
     * Register a class / callback that should be used to delete users.
     *
     * @return void
     */
    public static function deleteUsersUsing(string $class): void
    {
        app()->singleton(DeletesUsers::class, $class);
    }

    /**
     * Register a class / callback that should be used to reset user passwords.
     */
    public static function resetUserPasswordsUsing(string $class): void
    {
        app()->singleton(ResetsUserPasswords::class, $class);
    }

    public static function getVerifyEmailUrl(UserContract $user): string
    {
        return URL::temporarySignedRoute(
            config('filament-jet.route_group_prefix').'auth.email-verification.verify',
            now()->addMinutes(config('auth.verification.expire', 60)),
            [
                'id' => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
            ],
        );
    }

    public static function getResetPasswordUrl(string $token, UserContract $user): string
    {
        return URL::signedRoute(config('filament-jet.route_group_prefix').'auth.password-reset.reset', [
            'email' => $user->getEmailForPasswordReset(),
            'token' => $token,
        ]);
    }

    public static function setPasswordRules(array $rules): void
    {
        self::$passwordRules = $rules ?: Password::default();
    }

    public static function getPasswordRules(): array
    {
        return self::$passwordRules;
    }

    /**
     * Determine if FilamentJet is confirming two factor authentication configurations.
     *
     * @return bool
     */
    public static function confirmsTwoFactorAuthentication()
    {
        return Features::enabled(Features::twoFactorAuthentication()) &&
            Features::optionEnabled(Features::twoFactorAuthentication(), 'confirm');
    }

    /**
     * Find the path to a localized Markdown resource.
     *
     * @param  string  $name
     * @return string|null
     */
    public static function localizedMarkdownPath($name)
    {
        $localName = preg_replace('#(\.md)$#i', '.'.app()->getLocale().'$1', $name);

        return Arr::first([
            resource_path('markdown/'.$localName),
            resource_path('markdown/'.$name),
        ], function ($path) {
            return file_exists($path);
        });
    }
}
