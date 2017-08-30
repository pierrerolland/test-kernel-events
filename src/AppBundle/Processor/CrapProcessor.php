<?php

namespace AppBundle\Processor;

use AppBundle\Event\Event\Events;
use AppBundle\Event\Event\Event;
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
        $shittyData = [1, 2, 3];
        $crappyData = [4, 5, 6];

        $dispatcher = $this->dispatcher;
        $dispatcher->addListener(KernelEvents::TERMINATE, function () use ($dispatcher, $crappyData) {
            $dispatcher->dispatch(Events::SHITTY, new Event($crappyData));
        });
        $dispatcher->addListener(KernelEvents::TERMINATE, function () use ($dispatcher, $shittyData) {
            $dispatcher->dispatch(Events::SHITTY, new Event($shittyData));
        });
    }
}
