<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RefreshTokenSubscriber implements EventSubscriberInterface
{
    public function onKernelController(ControllerEvent $event): void
    {
      //  var_dump('check access token');
        // Load the access token from the session, and refresh if required
//        $accessToken = $session->get('access_token');
//
//        if ($accessToken->hasExpired()) {
//            $accessToken = $client->refreshAccessToken($accessToken->getRefreshToken());
//
//            // Update the stored access token for next time
//            $session->set('access_token', $accessToken);
//        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
