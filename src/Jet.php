<?php

namespace ArtMin96\FilamentJet;

class Jet
{
    public function getTwoFactorLoginSessionPrefix(): string
    {
        return strval(Features::getOption(Features::twoFactorAuthentication(), 'authentication.session_prefix'));
    }
}