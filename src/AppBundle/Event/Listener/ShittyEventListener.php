<?php

namespace AppBundle\Event\Listener;

use AppBundle\Event\Event\ShittyEvent;

class ShittyEventListener
{
    /**
     * @param ShittyEvent $event
     */
    public function onShitty(ShittyEvent $event)
    {
        file_put_contents(__DIR__ . '/../../../../result.txt', $event->getData());
    }
}
