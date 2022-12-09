<?php

namespace Rcarreirao\Intereasyapi\Providers;

use Rcarreirao\Intereasyapi\Api\Auth\Auth;

use Illuminate\Support\ServiceProvider;


class InterEasyApiServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        \Rcarreirao\Intereasyapi\Interbanking::authenticatesUsing(Auth::class);

    }
}
