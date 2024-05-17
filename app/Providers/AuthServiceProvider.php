<?php

namespace App\Providers;

use App\Models\User\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('show-users', function (User $user){
            if ($user->getRole() == 0){
                return true;
            }
            else{
                return false;
            }
        });

        Gate::define('update-delete', function (User $user){
            if ($user->getRole() != 2){
                return true;
            }
            else{
                return false;
            }
        });

        Gate::define('show-categories', function (User $user){
            if ($user->getRole() != 2){
                return true;
            }
            else{
                return false;
            }
        });
    }
}
