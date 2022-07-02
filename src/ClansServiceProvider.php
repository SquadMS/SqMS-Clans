<?php

namespace SquadMS\Clans;

use Illuminate\Support\ServiceProvider;

class ClansServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Configuration */
        $this->mergeConfigFrom(__DIR__.'/../config/sqms-clans.php', 'sqms-clans');

        /* Load Migrations */
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
