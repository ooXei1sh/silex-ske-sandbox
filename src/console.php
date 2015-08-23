<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

$console = new Application();

$console
    ->getDefinition()
    ->addOption(new InputOption('--env', '-e', InputOption::VALUE_REQUIRED, 'The Environment name.', 'dev'));

if (isset($app['cache.path'])) {
    $command = new SKE\Command\CacheClearCommand;
    $command->setCachePath($app['cache.path']);
    $console->add($command);
}

if ('dev' === $app['environment']) {

    $config = new \Doctrine\ORM\Configuration();
    $driverImpl = $config->newDefaultAnnotationDriver(array(
        __DIR__.'/Dev',
    ));
    $config->setMetadataDriverImpl($driverImpl);
    $config->setProxyDir($app['orm.proxies_dir']);
    $config->setProxyNamespace('Proxies');

    $em = EntityManager::create($app['db.options'], $config);
    $helperSet = new HelperSet(array(
        'db' => new ConnectionHelper($em->getConnection()),
        'em' => new EntityManagerHelper($em)
    ));
    $console->setHelperSet($helperSet);
    ConsoleRunner::addCommands($console);
}

return $console;
