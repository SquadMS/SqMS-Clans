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
    
    function users() : HasMany
    {
        return $this->hasMany(SquadMSUser::class);
    }
    
    function admins() : HasMany
    {
        return $this->hasMany(SquadMSUser::class);
    }
}
