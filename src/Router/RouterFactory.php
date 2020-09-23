<?php

declare(strict_types=1);

namespace App\Router;

use Nette\Application\Routers\RouteList;

final class RouterFactory
{
    public function createRouter(): RouteList
    {
        $router = new RouteList();

        $router->add($this->createFrontRouter());

        return $router;
    }

    private function createFrontRouter(): RouteList
    {
        $router = new RouteList('Front');

        $router->addRoute('[!<locale=cs cs|en>/]<presenter>/<action>', 'Homepage:default');

        return $router;
    }
}
