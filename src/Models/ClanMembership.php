<?php

namespace SquadMS\Clans\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use SquadMS\Foundation\Models\SquadMSUser;

class ClanMembership extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'admin'
    ];
    
    function clan() : BelongsTo
    {
        return $this->belongsTo(Clan::class);
    }
    
    function user() : BelongsTo
    {
        return $this->belongsTo(SquadMSUser::class);
    }
}
