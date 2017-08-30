<?php

namespace AppBundle\Processor;

use AppBundle\Event\Event\Events;
use AppBundle\Event\Event\ShittyEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class CrapProcessor
{
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function process()
    {
        $data = ['crap', 'crop', 'crip'];

        $dispatcher = $this->dispatcher;
        $dispatcher->addListener(KernelEvents::TERMINATE, function () use ($dispatcher, $data) {
            $dispatcher->dispatch(Events::SHITTY, new ShittyEvent($data));
        });
    }
}
