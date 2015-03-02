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

    public function add(string $message, string $type)
    {
        $this->store->add($message, $type);
    }

    public function prior()
    {
        return $this->store->prior();
    }

    public function priorOfType(AlertType $type)
    {
        return $this->prior()->filter(function ($item) use ($type) {
            return $item['type'] === $type;
        });
    }
}
