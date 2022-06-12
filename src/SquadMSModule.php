<?php

namespace SquadMS\Clans;

use SquadMS\Foundation\Modularity\Contracts\SquadMSModule as SquadMSModuleContract;

class SquadMSModule extends SquadMSModuleContract
{
    public static function getIdentifier(): string
    {
        return 'sqms-clans';
    }

    public static function getName(): string
    {
        return 'SquadMS Clans';
    }
}
