<?php

namespace Dev\Pub\Provider\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

class GlobalControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers
            ->get('/', 'Dev\Pub\Controller\GlobalController::indexAction')
            // ->value('id', '1')
            // ->assert('id', '\d+')
            // ->requireHttps()
            // ->convert('id', function () { /* ... */ })
            // ->before(function () { /* ... */ })
            ->bind('homepage')
        ;

        $controllers
            ->match('/page-with-cache', 'Dev\Pub\Controller\GlobalController::cacheAction')
            ->bind('page_with_cache')
        ;

        $controllers
            ->match('/form', 'Dev\Pub\Controller\GlobalController::formAction')
            ->bind('form')
        ;

        $controllers
            ->match('/doctrine', 'Dev\Pub\Controller\GlobalController::doctrineAction')
            ->bind('doctrine')
        ;

        $controllers
            ->match('/login', 'Dev\Pub\Controller\GlobalController::loginAction')
            ->bind('login')
        ;

        $controllers
            ->match('/logout', 'Dev\Pub\Controller\GlobalController::logoutAction')
            ->bind('logout')
        ;

        return $controllers;
    }
}
