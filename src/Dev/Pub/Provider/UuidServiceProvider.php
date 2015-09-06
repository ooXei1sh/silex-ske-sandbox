<?php

namespace Dev\Pub\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

class UuidServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['uuid'] = $app->share(function () use ($app) {
            $uuid4 = Uuid::uuid4();
            return $uuid4;
        });
    }

    public function boot(Application $app)
    {
    }
}
