<?php

namespace SquadMS\Clans\Providers;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use SquadMS\Clans\Filament\Resources\ClanResource;

class FilamentServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        ClanResource::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('sqms-clans');
    }
}
