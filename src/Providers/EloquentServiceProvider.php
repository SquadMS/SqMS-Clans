<?php

namespace SquadMS\Clans\Providers;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use SquadMS\Clans\Models\Clan;
use SquadMS\Clans\Models\ClanMembership;
use SquadMS\Foundation\Models\SquadMSUser;

class EloquentServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        SquadMSUser::resolveRelationUsing('clan', static function (SquadMSUser $user): BelongsToMany {
            return $user->belongsToMany(Clan::class, ClanMembership::class);
        });
    }
}
