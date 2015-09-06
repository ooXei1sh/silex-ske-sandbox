<?php

namespace Dev\Pub\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;
use Dev\Pub\Provider\UserProvider;

class UserServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['security.users'] = $app->share(function () use ($app) {
            return new UserProvider($app['db']);
        });
    }

    public function boot(Application $app)
    {
        $tmp = $app['security.firewalls'];
        $tmp['main']['users'] = $app['security.users'];
        $app['security.firewalls'] = $tmp;
        unset($tmp);

        $app['security.encoder.digest'] = $app->share(function () use ($app) {
            return new BCryptPasswordEncoder(10);
        });
    }
}
