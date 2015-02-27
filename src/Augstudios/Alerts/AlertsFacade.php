<?php

namespace Augstudios\Alerts;

use Illuminate\Support\Facades\Facade;

class AlertsFacade extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'alerts';
    }
}