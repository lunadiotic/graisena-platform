<?php

namespace App\Providers;

use App\Distribution;
use App\DistributionSeed;
use App\Nursery;
use App\Policies\DistributionPolicy;
use App\Policies\DistributionSeedPolicy;
use App\Policies\NurseryPolicy;
use App\Policies\ProgramPolicy;
use App\Policies\StockPolicy;
use App\Policies\SubprogramPolicy;
use App\Program;
use App\Stock;
use App\Subprogram;
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
        Program::class => ProgramPolicy::class,
        Subprogram::class => SubprogramPolicy::class,
        Nursery::class => NurseryPolicy::class,
        Stock::class => StockPolicy::class,
        Distribution::class => DistributionPolicy::class,
        DistributionSeed::class => DistributionSeedPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role_id == '1';
        });

        /* define a manager user role */
         Gate::define('isContributor', function($user) {
            return $user->role_id == '2';
        });

        /* define a user role */
        Gate::define('isGuest', function($user) {
            return $user->role_id == '3';
        });
    }
}
