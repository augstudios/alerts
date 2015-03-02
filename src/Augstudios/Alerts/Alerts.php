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
     * @param string           $message
     * @param AlertType|string $type
     *
     * @return Alerts
     */
    public function add($message, $type)
    {
        $this->store->add($message, $type);

        return $this;
    }

    /**
     * @param $message
     *
     * @return Alerts
     */
    public function success($message)
    {
        return $this->add($message, AlertType::Success);
    }

    /**
     * @param $message
     *
     * @return Alerts
     */
    public function danger($message)
    {
        return $this->add($message, AlertType::Danger);
    }

    /**
     * @param $message
     *
     * @return Alerts
     */
    public function warning($message)
    {
        return $this->add($message, AlertType::Warning);
    }

    /**
     * @param $message
     *
     * @return mixed
     */
    public function info($message)
    {
        return $this->add($message, AlertType::Info);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function prior()
    {
        return $this->store->prior();
    }

    /**
     * @param AlertType|string $type
     *
     * @return \Illuminate\Support\Collection
     */
    public function priorOfType($type)
    {
        return $this->store->priorOfType($type);
    }
}
