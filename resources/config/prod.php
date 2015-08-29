<?php
return array(
    'locale' => 'en',
    'session.default_locale' => 'en',
    'translator.messages' => array(
        'en' => '%app.path%/resources/locales/en.yml',
    ),
    'log.path'   => '%app.path%/resources/logs',
    'cache.path' => '%app.path%/resources/cache',
    'http_cache.cache_dir' => '%app.path%/resources/cache/http',
    'serializer.cache.path' => '%app.path%/resources/cache/serializer',
    'twig.options.cache' => '%app.path%/resources/cache/twig',
    'profiler.cache_dir' => '%app.path%/resources/cache/profiler',
    'session.storage.options' => array(
        'cookie_lifetime' => (60 * 60 * 12) // 12 hours
    ),
    'monolog.logfile' => '%app.path%/resources/log/app.log',
    'monolog.name'    => 'app',
    'monolog.level'   => 400,
    'db.options' => array(
        'driver' => '%db.driver%',
        'charset' => '%db.charset%',
        'master' => array(
            'user'     => '%db.user%',
            'password' => '%db.password%',
            'host'     => '%db.host%',
            'dbname'   => '%db.dbname%'
        ),
        'slaves' => array(
            array(
                'user'     => '%db.user%',
                'password' => '%db.password%',
                'host'     => '%db.host%',
                'dbname'   => '%db.dbname%'
            )
        ),
        'wrapperClass' => 'Doctrine\DBAL\Connections\MasterSlaveConnection'
    ),
    'orm.proxies_dir'   => '%app.path%/resources/cache/doctrine/proxies',
    'orm.default_cache' => array(
        'driver' => 'filesystem',
        'path' => '%app.path%/resources/cache/doctrine/cache',
    ),
    'orm.em.options'    => array(
        'mappings' => array(
            array(
                'type' => 'annotation',
                'namespace' => 'Dev\Pub\Entity',
                'path' => '%app.path%/src/Dev/Pub/Entity',
            ),
        )
    ),
    'twig.options' => array(
        'cache' => '%app.path%/resources/cache/twig',
        'strict_variables' => true,
    ),
    'twig.form.templates' => array(
        'bootstrap_3_layout.html.twig',
    ),
    'twig.path' => array(
        '%app.path%/resources/views'
    ),
    'security.firewalls' => array(
        'main' => array(
            'pattern' => '^/',
            'anonymous' => true,
            'form' => array(
                'login_path' => '/login',
                'username_parameter' => 'form[username]',
                'password_parameter' => 'form[password]',
                'form_login' => array(
                    'csrf_provider' => 'form.csrf_provider',
                ),
            ),
            'logout' => array('logout_path' => '/logout'),
            'users' => array(
                'username' => array(
                    '%security.role%',
                    '%security.password%',
                ),
            ) ,
        ),
    ),
    'security.role_hierarchy' => array(
        'ROLE_USER' => array(),
        'ROLE_ADMIN' => array('ROLE_USER'),
        'ROLE_SUPER_ADMIN' => array('ROLE_USER','ROLE_ADMIN','ROLE_ALLOWED_TO_SWITCH'),
    ),
    'security.access_rules' => array(
        array('^/user', 'ROLE_USER'),
        array('^/admin', 'ROLE_ADMIN'),
        array('^/root', 'ROLE_SUPER_ADMIN'),
    ),
    'mailer.options' => array(
        'issmtp' => true,
        'smtpauth' => true,
        'smtpsecure' => 'ssl',
        'port' => 465,
        'host' =>'%mailer.host%',
        'username' =>'%mailer.username%',
        'password' =>'%mailer.password%',
    ),
);
