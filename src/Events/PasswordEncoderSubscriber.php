<?php

namespace App\Events;

use ApiPlatform\Symfony\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PasswordEncoderSubscriber implements EventSubscriberInterface
{
    private $encoder;

    /**
     * @param $encoder
     * @var UserPasswordHasherInterface
     */
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // Hash le password avec les requêtes http
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['encodePassword', EventPriorities::PRE_WRITE]
        ];
    }

    public function encodePassword(ViewEvent $event)
    {
        $result = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        if ($result instanceof User && ($method === "POST" || $method == "PUT" || ($method == "PATCH" && $event->getRequest()->get("password") == "true"))) {
            $hash = $this->encoder->hashPassword($result, $result->getPassword());
            $result->setPassword($hash);
        }
    }
}
