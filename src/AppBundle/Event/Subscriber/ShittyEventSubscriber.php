<?php

namespace AppBundle\Event\Subscriber;

use AppBundle\Event\Event\Event;
use AppBundle\Event\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ShittyEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var array
     */
    private $fullData = [];

    /**
     * @var int
     */
    private $iterations = 0;

    public static function getSubscribedEvents()
    {
        return [
            Events::SHITTY => 'onShitty'
        ];
    }

    /**
     * @param Event $event
     */
    public function onShitty(Event $event)
    {
        $this->fullData = array_merge($this->fullData, $event->getData());

        if ($this->iterations === 1) {
            file_put_contents(__DIR__ . '/../../../../result.txt', $this->fullData, FILE_APPEND);
        }
        $this->iterations++;
    }
}
