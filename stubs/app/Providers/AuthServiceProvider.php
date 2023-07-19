<?php

declare(strict_types=1);

namespace App\Providers;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
>>>>>>> 39fcb522 (rebase)
=======
>>>>>>> 354a30e7 (Fix styling)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
>>>>>>> 5be9ebe5 (rebase)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
=======
>>>>>>> 88c140b (Fix styling)
>>>>>>> e618ae9f (rebase)
=======
>>>>>>> 37a50ce5 (.)
=======
=======
use Modules\User\Models\Team;
>>>>>>> 798d2d5 (.)
>>>>>>> 0b6c922d (rebase)
=======
>>>>>>> ac955b82 (.)
=======
use App\Models\Team;
>>>>>>> 7eb101f0 (up)
use App\Policies\TeamPolicy;
<<<<<<< HEAD
>>>>>>> 080a5a33 (.)
=======
=======
>>>>>>> 0da7d9b6 (up)
>>>>>>> 51a866c6 (.)
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void {
        $this->registerPolicies();
    }
}
