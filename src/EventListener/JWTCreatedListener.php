<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class JWTCreatedListener
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function onJWTCreated(JWTCreatedEvent $event) : void
    {
        $request = $this->requestStack->getCurrentRequest();

        $payload       = $event->getData();
        $payload['email'] = $event->getUser()->getEmail();

        $event->setData($payload);
    }
}