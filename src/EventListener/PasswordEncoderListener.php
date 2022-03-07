<?php

namespace App\EventListener;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class PasswordEncoderListener implements EventSubscriberInterface {

    private UserPasswordHasherInterface $encoder;
    private RequestStack $requestStack;

    public function __construct(UserPasswordHasherInterface $encoder, RequestStack $requestStack)
    {
        $this->encoder = $encoder;
        $this->requestStack = $requestStack;
    }

    /**
     * @return Array | Void
     */
    public static function getSubscribedEvents() {
        return [
            KernelEvents::VIEW => ["encodePassword", EventPriorities::PRE_WRITE],
        ];
    }
    
    public function encodePassword(ViewEvent $event) {
        $instanceOfUserClass = $event->getControllerResult();
        if ($instanceOfUserClass instanceof User) {
            $hashPassword = $this->encoder->hashPassword($instanceOfUserClass, $instanceOfUserClass->getPassword());
            $instanceOfUserClass->setPassword($hashPassword);
        }
      
    }
}