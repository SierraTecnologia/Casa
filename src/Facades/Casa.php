<?php

namespace Casa\Facades;

use Illuminate\Support\Facades\Facade;

class Casa extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'casa';
    }
}
