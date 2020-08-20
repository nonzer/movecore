<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Authorize
        Gate::define('view-dashboard', function ($user) {
            return $user->hasRole('CEO');
        });

        Gate::define('view-orderAndClient', function ($user) {
            return $user->hasRole('Chef_unite');
        });

        Gate::define('view-grc', function ($user) {
            return $user->hasRole('GRC');
        });

        Gate::define('view-configAndPersonal', function ($user){
            return $user->hasRole('Admin');
        });

        Gate::define('view-delivery', function ($user){
            return $user->hasRole('Livreur');
        });
    }
}
