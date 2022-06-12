<?php

namespace SquadMS\Clans\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use SquadMS\Foundation\Models\SquadMSUser;

class Clan extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name'
    ];
    
    function founder() : BelongsToMany
    {
        return $this->belongsToMany(SquadMSUser::class, ClanMembership::class);
    }
    
    function members() : BelongsToMany
    {
        return $this->belongsToMany(SquadMSUser::class, ClanMembership::class);
    }
    
    function admins() : BelongsToMany
    {
        return $this->belongsToMany(SquadMSUser::class, ClanMembership::class)->whereTrue('clan_memberships.admin');
    }
}
