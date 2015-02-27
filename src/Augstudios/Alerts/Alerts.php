<?php

namespace Augstudios\Alerts;

class Alerts
{
    const TYPE_INFO = 'info';
    const TYPE_SUCCESS = 'success';
    const TYPE_DANGER = 'danger';
    const TYPE_WARNING = 'warning';

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

    public function add($message, $type = 'info')
    {
        $this->store->add($message, $type);
    }

    public function prior()
    {
        return $this->store->prior();
    }

    public function priorOfType($type)
    {
        return $this->prior()->filter(function ($item) use ($type) {
            return $item['type'] === $type;
        });
    }
}