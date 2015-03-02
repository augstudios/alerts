<?php

namespace Augstudios\Alerts;

use MyCLabs\Enum\Enum;

class AlertType extends Enum
{
    const Info = 'info';
    const Success = 'success';
    const Danger = 'danger';
    const Warning = 'warning';

    /**
     * @return AlertType
     */
    public static function Info() {
        return new AlertType(self::Info);
    }

    /**
     * @return AlertType
     */
    public static function Success() {
        return new AlertType(self::Success);
    }

    /**
     * @return AlertType
     */
    public static function Danger() {
        return new AlertType(self::Danger);
    }

    /**
     * @return AlertType
     */
    public static function Warning() {
        return new AlertType(self::Warning);
    }
}
