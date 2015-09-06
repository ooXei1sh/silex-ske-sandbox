<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Http\SecurityEvents;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\Event\SwitchUserEvent;

/**
 * Security events
 */
$app->on(AuthenticationEvents::AUTHENTICATION_SUCCESS, function (AuthenticationEvent $event) {
    // $token = $event->getAuthenticationToken();
    // $tokenUser = $token->getUser();
    // $roles = $token->getRoles();
});
$app->on(AuthenticationEvents::AUTHENTICATION_FAILURE, function (AuthenticationEvent $event) {});
$app->on(SecurityEvents::INTERACTIVE_LOGIN, function (InteractiveLoginEvent $event) use ($app) {});
$app->on(SecurityEvents::SWITCH_USER, function (SwitchUserEvent $event) {});

/**
 * Mount
 */
$app->mount('/', new Dev\Pub\Controller\GlobalControllerProvider());

/**
 * Error
 */
$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return new Response($message, $code);
});

return $app;
