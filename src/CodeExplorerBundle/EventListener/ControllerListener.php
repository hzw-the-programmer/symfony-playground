<?php

namespace CodeExplorerBundle\EventListener;

use CodeExplorerBundle\Twig\SourceCodeExtension;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class ControllerListener
{
    private $twigExtension;

    public function __construct(SourceCodeExtension $twigExtension)
    {
        $this->twigExtension = $twigExtension;
    }

    public function registerCurrentController(FilterControllerEvent $event)
    {
        if ($event->isMasterRequest()) {
            $this->twigExtension->setController($event->getController());
        }
    }
}

