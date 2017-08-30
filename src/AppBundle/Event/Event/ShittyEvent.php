<?php

namespace AppBundle\Event\Event;

use Symfony\Component\EventDispatcher\Event;

class ShittyEvent extends Event
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
