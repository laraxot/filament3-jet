<?php

namespace App\Providers;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\User\Models\Team;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
