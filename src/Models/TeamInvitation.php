<?php

namespace ArtMin96\FilamentJet\Models;

use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Database\Eloquent\Model;

class TeamInvitation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'email',
        'role',
    ];

    /**
     * Get the team that the invitation belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(FilamentJet::teamModel());
    }
}