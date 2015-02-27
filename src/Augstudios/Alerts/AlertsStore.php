<?php

namespace Augstudios\Alerts;

use Illuminate\Support\Collection;

interface AlertsStore
{
    /**
     * @param $message
     * @param $type
     *
     * @return AlertsStore
     */
    public function add($message, $type);

    /**
     * @return Collection
     */
    public function current();

    /**
     * @return Collection
     */
    public function prior();
}