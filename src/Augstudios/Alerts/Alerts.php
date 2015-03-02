<?php

namespace Augstudios\Alerts;

class Alerts
{
    /**
     * The session writer.
     *
     * @var AlertsStore
     */
    private $store;

    /**
     * Create a new flash notifier instance.
     *
     * @param AlertsStore $store
     */
    public function __construct(AlertsStore $store)
    {
        $this->store = $store;
    }

    /**
     * @param string $message
     * @param AlertType|string $type
     */
    public function add($message, $type)
    {
        $this->store->add($message, $type);
    }

    public function prior()
    {
        return $this->store->prior();
    }

    /**
     * @param AlertType|string $type
     *
     * @return static
     */
    public function priorOfType($type)
    {
        return $this->store->priorOfType($type);
    }
}
