<?php

require_once __DIR__.'/../vendor/autoload.php';

// prevent access to debug environment on production server
if (isset($_SERVER['HTTP_CLIENT_IP']) || isset($_SERVER['HTTP_X_FORWARDED_FOR']) ||
    !in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1')))
{
    header('HTTP/1.0 403 Forbidden');
    exit('403 Forbidden.');
}

Symfony\Component\Debug\Debug::enable();

$app = new Silex\Application();

$app['environment'] = 'dev';

require __DIR__.'/../src/app.php';
require __DIR__.'/../src/controllers.php';

$app->run();
