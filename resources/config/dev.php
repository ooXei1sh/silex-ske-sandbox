<?php
return array(
    'debug' => true,
    'twig.options' => array(
        'cache' => false,
    ),
    'orm.default_cache' => 'array',
    'monolog.logfile' => '%app.path%/resources/log/app.log',
    'monolog.name'    => 'app',
    'monolog.level'   => 400,
);
