<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Currency' => 'App\Policies\CurrencyPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create', 'App\Policies\CurrencyPolicy@create');
        Gate::define('update', 'App\Policies\CurrencyPolicy@update');
        Gate::define('delete', 'App\Policies\CurrencyPolicy@delete');

        //
    }
}
