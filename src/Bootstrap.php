<?php

declare(strict_types=1);

namespace App;

use Nette\Configurator;

class Bootstrap
{
    public static function boot(): Configurator
    {
        $configurator = new Configurator();

        $configurator->setDebugMode(strpos((string)getenv('VIRTUAL_HOST'), '.localhost') !== false);

        $configurator->enableTracy(dirname(__DIR__) . '/log');

        $configurator->setTimeZone('Europe/Prague');

        $configurator->setTempDirectory(dirname(__DIR__) . '/var');

        $configurator->addParameters([
            'templateDir' => dirname(__DIR__) . '/templates',
            'translationDir' => dirname(__DIR__) . '/translations',
        ]);

        $configurator->createRobotLoader()->addDirectory(__DIR__)->register();

        $configurator->addConfig(dirname(__DIR__) . '/config/application.neon');

        $configurator->addConfig(dirname(__DIR__) . '/config/environment.neon');

        return $configurator;
    }
}
