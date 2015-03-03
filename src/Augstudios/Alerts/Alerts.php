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
    public function flash($message, $type)
    {
        $this->store->flash($message, $type);

        return $this;
    }

    /**
     * @param $message
     *
     * @return Alerts
     */
    public function flashSuccess($message)
    {
        return $this->flash($message, AlertType::Success);
    }

    /**
     * @param $message
     *
     * @return Alerts
     */
    public function flashDanger($message)
    {
        return $this->flash($message, AlertType::Danger);
    }

    /**
     * @param $message
     *
     * @return Alerts
     */
    public function flashWarning($message)
    {
        return $this->flash($message, AlertType::Warning);
    }

    /**
     * @param $message
     *
     * @return mixed
     */
    public function flashInfo($message)
    {
        return $this->flash($message, AlertType::Info);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->store->prior();
    }

    /**
     * @param AlertType|string $type
     *
     * @return \Illuminate\Support\Collection
     */
    public function ofType($type)
    {
        return $this->store->priorOfType($type);
    }
}
