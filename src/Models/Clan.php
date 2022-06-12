<?php

namespace SquadMS\Clans\Models;

use Illuminate\Database\Eloquent\Model;
use SquadMS\Foundation\Models\SquadMSUser;

class Clan extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name'
    ];
    
    function founder() : HasOneThrough
    {
        return $this->hasOneThrough(SquadMSUser::class, ClanMembership::class);
    }
    
    function members() : HasManyThrough
    {
        return $this->hasManyThrough(SquadMSUser::class, ClanMembership::class);
    }
    
    function admins() : HasManyThrough
    {
        return $this->hasManyThrough(SquadMSUser::class, ClanMembership::class)->whereTrue('clan_memberships.admin');
    }
}
