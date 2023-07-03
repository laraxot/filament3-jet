<?php

namespace ArtMin96\FilamentJet\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class TeamEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The team instance.
     *
     * @var \Modules\User\Models\Team
     */
    public $team;

    /**
     * Create a new event instance.
     *
     * @param  \Modules\User\Models\Team  $team
     * @return void
     */
    public function __construct($team)
    {
        $this->team = $team;
    }
}
