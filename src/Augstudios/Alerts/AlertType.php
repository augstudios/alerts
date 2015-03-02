<?php

namespace Augstudios\Alerts;

use SplEnum;

class AlertType extends SplEnum
{
    const __default = self::Info;

    const Info = 'info';
    const Success = 'success';
    const Danger = 'danger';
    const Warning = 'warning';
}
