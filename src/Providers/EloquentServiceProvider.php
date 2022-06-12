<?php

namespace SquadMS\Clans\Providers;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use SquadMS\Foundation\Models\SquadMSUser;
use SquadMS\Clans\Models\Clan;

class EloquentServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        SquadMSUser::resolveRelationUsing('clan', static function (SquadMSUser $user): HasOne {
            return $user->hasOne(Clan::class);
        });
    }
}
