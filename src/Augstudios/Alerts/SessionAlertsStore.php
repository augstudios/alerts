<?php

namespace Augstudios\Alerts;

use Illuminate\Session\Store;
use Illuminate\Support\Collection;

class SessionAlertsStore implements AlertsStore
{
    /**
     *
     */
    const STORE_KEY = 'alerts';

    /** @var Store $session */
    protected $session;

    /** @var Collection $current */
    protected $current;

    /** @var Collection $prior */
    protected $prior;

    /**
     * @param Store      $session
     * @param Collection $collection
     */
    function __construct(Store $session, Collection $collection)
    {
        $this->session = $session;
        $this->prior = $this->session->get(static::STORE_KEY, $collection);
        $this->current = $collection;
    }

    /**
     * @param           $message
     * @param AlertType $type
     *
     * @return $this
     */
    public function add($message, AlertType $type)
    {
        $this->current->push([
            'type' => $type,
            'message' => $message
        ]);

        $this->session->flash(static::STORE_KEY, $this->current);

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
}
