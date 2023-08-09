<?php

namespace ArtMin96\FilamentJet;

use ArtMin96\FilamentJet\Contracts\TwoFactorAuthenticationProvider as TwoFactorAuthenticationProviderContract;
use Illuminate\Cache\Repository;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorAuthenticationProvider implements TwoFactorAuthenticationProviderContract
{
    /**
     * The underlying library providing two factor authentication helper services.
     *
     * @var \PragmaRX\Google2FA\Google2FA
     */
    protected $engine;

    /**
     * The cache repository implementation.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Create a new two factor authentication provider instance.
     *
     * @return void
     */
    public function __construct(Google2FA $engine, Repository $cache)
    {
        $this->engine = $engine;
        $this->cache = $cache;
    }

    /**
     * Generate a new secret key.
     *
     * @return string
     *
     * @throws \PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException
     * @throws \PragmaRX\Google2FA\Exceptions\InvalidCharactersException
     * @throws \PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException
     */
    public function generateSecretKey()
    {
        return $this->engine->generateSecretKey();
    }

    /**
     * Get the two factor authentication QR code URL.
     *
     * @param  string  $companyName
     * @param  string  $companyEmail
     * @param  string  $secret
     * @return string
     */
    public function qrCodeUrl($companyName, $companyEmail, $secret)
    {
        return $this->engine->getQRCodeUrl($companyName, $companyEmail, $secret);
    }

    /**
     * Verify the given code.
     *
     * @return bool
     *
     * @throws \PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException
     * @throws \PragmaRX\Google2FA\Exceptions\InvalidCharactersException
     * @throws \PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException
     */
    public function verify($secret, $code)
    {
        if (is_int($customWindow = config('filament-jet-options.two-factor-authentication.window'))) {
            $this->engine->setWindow($customWindow);
        }

        /** @var int $oldTimestamp */
        $oldTimestamp = $this->cache->get($key = 'filament-jet.2fa_codes.' . md5($code));
        $timestamp = $this->engine->verifyKeyNewer(
            $secret,
            $code,
            $oldTimestamp
        );

        if ($timestamp !== false) {
            if ($timestamp === true) {
                $timestamp = $this->engine->getTimestamp();
            }

            $this->cache->put($key, $timestamp, ($this->engine->getWindow() ?: 1) * 60);

            return true;
        }

        return false;
    }
}
