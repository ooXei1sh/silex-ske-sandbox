<?php

namespace Dev\Pub\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\Translation\Loader\YamlFileLoader;

class TranslationYamlServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
            $translator->addLoader('yaml', new YamlFileLoader());

            // Register yaml resources
            foreach ($app['translator.resources.yaml'] as $locale => $resource) {
                $translator->addResource('yaml', $resource, $locale);
            }

            return $translator;
        }));
    }

    public function boot(Application $app)
    {
    }
}
