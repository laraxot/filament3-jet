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
<<<<<<< HEAD
     * @var \App\Models\Team
>>>>>>> 59fd8d2c (.)
=======
     * @var \Modules\User\Models\Team
>>>>>>> 51a866c6 (.)
     */
    public TeamContract $team;

    /**
     * Create a new event instance.
     *
<<<<<<< HEAD
<<<<<<< HEAD
=======
     * @param  \App\Models\Team  $team
>>>>>>> 59fd8d2c (.)
=======
     * @param  \Modules\User\Models\Team  $team
>>>>>>> 51a866c6 (.)
     * @return void
     */
    public function __construct(TeamContract $team)
    {
        $this->team = $team;
    }
}
