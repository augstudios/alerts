<?php

namespace Augstudios\Alerts;

use MyCLabs\Enum\Enum;

class AlertType extends Enum
{
    const __default = self::Info;

    const Info = 'info';
    const Success = 'success';
    const Danger = 'danger';
    const Warning = 'warning';
}
