<?php

namespace SquadMS\Clans\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use SquadMS\Foundation\Models\SquadMSUser;

class Clan extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'tag',
        'website',
        'logo'
    ];

    public function memberships(): HasMany
    {
        return $this->hasMany(ClanMembership::class);
    }

    public function founder(): BelongsToMany
    {
        return $this->belongsToMany(SquadMSUser::class, ClanMembership::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(SquadMSUser::class, ClanMembership::class);
    }

    public function admins(): BelongsToMany
    {
        return $this->belongsToMany(SquadMSUser::class, ClanMembership::class)->whereTrue('clan_memberships.admin');
    }
}
