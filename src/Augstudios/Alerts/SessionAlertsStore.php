<?php

namespace Augstudios\Alerts;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Session\Store;
use Illuminate\Support\Collection;

class SessionAlertsStore implements AlertsStore
{
    /** @var string $session_key */
    protected $session_key;

    /** @var Store $session */
    protected $session;

    /** @var Collection $current */
    protected $current;

    /** @var Collection $prior */
    protected $prior;

    /**
     * @param Store      $session
     * @param Collection $collection
     * @param Repository $config
     */
    function __construct(Store $session, Collection $collection, Repository $config)
    {
        // set configurable options
        $this->session_key = $config->get('augstudios.alerts.session_key', 'alerts');

        // initialize properties
        $this->session = $session;
        $this->prior = $this->session->get($this->session_key, clone $collection);
        $this->current = clone $collection;
    }

    /**
     * @param AlertType|string $type
     *
     * @return mixed
     */
    private static function str_type($type)
    {
        return is_string($type) ? $type : $type->getValue();
    }

    /**
     * @param string           $message
     * @param AlertType|string $type
     *
     * @return $this
     */
    public function flash($message, $type)
    {
        $this->current->push([
            'type' => static::str_type($type),
            'message' => $message,
            'dismissible' => true
        ]);

        $this->session->flash($this->session_key, $this->current);

        return $this;
    }

    /**
     * @return Collection
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * @return Collection
     */
    public function prior()
    {
        return $this->prior;
    }

    /**
     * @param AlertType|string $type
     *
     * @return Collection
     */
    public function priorOfType($type)
    {
        return $this->prior()->filter(function ($item) use ($type) {
            return $item['type'] === static::str_type($type);
        });
    }
}
