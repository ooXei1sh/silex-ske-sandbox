<?php

use MJanssen\Provider\ServiceRegisterProvider;
use Igorw\Silex\ConfigServiceProvider;

$params = require __DIR__.'/../resources/config/params.php';

// set service providers
$app->register(new ConfigServiceProvider(__DIR__.'/../resources/config/services.php'));

// register service providers
$app->register(new ServiceRegisterProvider('config.providers'));

// configure service providers
$app->register(new ConfigServiceProvider(__DIR__.'/../resources/config/prod.php', $params));

if('dev' === $app['environment']) {
    $app->register(new ConfigServiceProvider(__DIR__."/../resources/config/dev.php", $params));
}
