<?php

namespace SquadMS\Clans\Providers;

use Illuminate\Support\ServiceProvider;
use SquadMS\Clans\SquadMSModule;
use SquadMS\Foundation\Facades\SquadMSModuleRegistry;

class ModulesServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        SquadMSModuleRegistry::register(SquadMSModule::class);
    }
}
