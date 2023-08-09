<?php

namespace ArtMin96\FilamentJet\Actions\Auth;

use ArtMin96\FilamentJet\FilamentJet;
use Closure;
use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Validation\ValidationException;

class AttemptToAuthenticate
{
    /**
     * The guard implementation.
     */
    protected StatefulGuard $guard;

    /**
     * Create a new controller instance.
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * @param  array<string, string>  $data
     * @return array|null
     */
    public function handle(array $data, Closure $next)
    {
        if ($this->guard->attempt([
            FilamentJet::username() => $data[FilamentJet::username()],
            'password' => $data['password'],
        ], boolval($data['remember']))) {
            return $next($data);
        }

        $this->throwFailedAuthenticationException();
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
    protected function fireFailedEvent(array $data): void
    {
        if (! is_string(config('filament.auth.guard'))) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }

        event(new Failed(config('filament.auth.guard'), null, [
            FilamentJet::username() => $data[FilamentJet::username()],
            'password' => $data['password'],
        ]));
    }
}
