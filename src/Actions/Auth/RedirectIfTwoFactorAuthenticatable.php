<?php

namespace ArtMin96\FilamentJet\Actions\Auth;

<<<<<<< HEAD
use ArtMin96\FilamentJet\Contracts\UserContract;
=======
use ArtMin96\FilamentJet\Contracts\HasTeamsContract as UserContract;
>>>>>>> 18d57393 (Fix styling)
use ArtMin96\FilamentJet\Events\TwoFactorAuthenticationChallenged;
use ArtMin96\FilamentJet\FilamentJet;
use ArtMin96\FilamentJet\Traits\TwoFactorAuthenticatable;
use Closure;
use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Livewire\Redirector;

class RedirectIfTwoFactorAuthenticatable
{
    /**
     * Undocumented variable
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Undocumented function
     *
     * @return mixed
     */
    public function handle(array $data, Closure $next)
    {
        $user = $this->validateCredentials($data);

        if (FilamentJet::confirmsTwoFactorAuthentication()) {
            if (optional($user)->two_factor_secret &&
                ! is_null(optional($user)->two_factor_confirmed_at) &&
                in_array(TwoFactorAuthenticatable::class, class_uses_recursive($user))) {
                return $this->twoFactorChallengeResponse($data, $user);
            } else {
                return $next($data);
            }
        }

        if (optional($user)->two_factor_secret &&
            in_array(TwoFactorAuthenticatable::class, class_uses_recursive($user))) {
            return $this->twoFactorChallengeResponse($data, $user);
        }

        return $next($data);
    }

    /**
     * Attempt to validate the incoming credentials.
     *
     * @param  array<string, string>  $data
     * @return UserContract
     */
    protected function validateCredentials(array $data)
    {
        $userProvider = $this->guard->getProvider();
        if (! method_exists($userProvider, 'getModel')) {
            throw new \Exception('strange things');
        }
        $model = $userProvider->getModel();

        return tap($model::where(FilamentJet::username(), $data[FilamentJet::username()])->first(), function ($user) use ($data) {
            if (! $user || ! $this->guard->getProvider()->validateCredentials($user, ['password' => $data['password']])) {
                $this->fireFailedEvent($data, $user);

                $this->throwFailedAuthenticationException();
            }
        });
    }

    /**
     * Throw a failed authentication validation exception.
     */
    protected function throwFailedAuthenticationException(): void
    {
        throw ValidationException::withMessages([
            FilamentJet::username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Fire the failed authentication attempt event with the given arguments.
     *
     * @param  array<string, string>  $data
     */
    protected function fireFailedEvent(array $data, UserContract $user = null): void
    {
        if ($user != null && ! $user instanceof \Illuminate\Contracts\Auth\Authenticatable) {
            throw new \Exception('strange things');
        }
        event(new Failed(config('filament.auth.guard'), $user, [
            FilamentJet::username() => $data[FilamentJet::username()],
            'password' => $data['password'],
        ]));
    }

    /**
     * Get the two factor authentication enabled response.
     */
    protected function twoFactorChallengeResponse(array $data, UserContract $user): Redirector|RedirectResponse
    {
        session()->put([
            jet()->getTwoFactorLoginSessionPrefix().'login.id' => $user->getKey(),
            jet()->getTwoFactorLoginSessionPrefix().'login.remember' => $data['remember'],
        ]);

        TwoFactorAuthenticationChallenged::dispatch($user);

        return redirect()->route('auth.two-factor.login');
    }
}
