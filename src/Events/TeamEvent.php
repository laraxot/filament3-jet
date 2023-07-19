<?php

namespace ArtMin96\FilamentJet\Events;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class TeamEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The team instance.
<<<<<<< HEAD
=======
     *
     * @var \App\Models\Team
>>>>>>> 59fd8d2c (.)
     */
    public TeamContract $team;

    /**
     * Create a new event instance.
     *
<<<<<<< HEAD
=======
     * @param  \App\Models\Team  $team
>>>>>>> 59fd8d2c (.)
     * @return void
     */
    public function __construct(TeamContract $team)
    {
        $this->team = $team;
    }
}
