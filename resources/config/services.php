<?php
return array(
    'config.providers' => array(
        'formServiceProvider' => array(
            'class' => 'Silex\Provider\FormServiceProvider'
        ),
        'monologServiceProvider' => array(
            'class' => 'Silex\Provider\MonologServiceProvider'
        ),
        'httpCacheServiceProvider' => array(
            'class' => 'Silex\Provider\HttpCacheServiceProvider'
        ),
        'sessionServiceProvider' => array(
            'class' => 'Silex\Provider\SessionServiceProvider'
        ),
        'translationServiceProvider' => array(
            'class' => 'Silex\Provider\TranslationServiceProvider'
        ),
        'urlGeneratorServiceProvider' => array(
            'class' => 'Silex\Provider\UrlGeneratorServiceProvider'
        ),
        'validatorServiceProvider' => array(
            'class' => 'Silex\Provider\ValidatorServiceProvider'
        ),
        'doctrineDbal' => array(
            'class' => 'Silex\Provider\DoctrineServiceProvider'
        ),
        'doctrineOrm' => array(
            'class' => 'Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider',
            'values' => array(
                'orm.default_cache' => array(
                    'driver' => 'filesystem',
                    'path' => null,
                ),
            ),
        ),
        'twigServiceProvider' => array(
            'class' => 'Silex\Provider\TwigServiceProvider'
        ),
        'securityServiceProvider' => array(
            'class' => 'Silex\Provider\SecurityServiceProvider'
        ),
        'httpFragmentServiceProvider' => array(
            'class' => 'Silex\Provider\HttpFragmentServiceProvider'
        ),        
        'serviceControllerServiceProvider' => array(
            'class' => 'Silex\Provider\ServiceControllerServiceProvider'
        ),
        'webProfilerServiceProvider' => array(
            'class' => 'Silex\Provider\WebProfilerServiceProvider'
        ),
    )
);
