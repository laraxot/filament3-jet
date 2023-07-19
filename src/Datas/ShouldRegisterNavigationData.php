<?php
namespace ArtMin96\FilamentJet\Datas;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ShouldRegisterNavigationData extends Data
{
    public bool $account;
    public bool $api_tokens;
    public bool $team_settings;
    public bool $create_team;
}