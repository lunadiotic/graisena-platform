<?php

namespace App\Providers;

use App\Policies\ProgramPolicy;
use App\Policies\SubprogramPolicy;
use App\Program;
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
        Subprogram::class => SubprogramPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
