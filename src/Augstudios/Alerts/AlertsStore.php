<?php

namespace Augstudios\Alerts;

use Illuminate\Support\Collection;

interface AlertsStore
{
    /**
     * @param string           $message
     * @param AlertType|string $type
     *
     * @return mixed
     */
    public function flash($message, $type);

    /**
     * @return Collection
     */
    public function current();

    /**
     * @return Collection
     */
    public function prior();

    /**
     * @param AlertType|string $type
     *
     * @return mixed
     */
    public function priorOfType($type);
}
