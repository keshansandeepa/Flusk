<?php

use App\Providers\ViewServiceProvider;
use App\Providers\FServiceProvider;
use App\Providers\MiddlewareServiceProvider;


$container->addServiceProvider(new MiddlewareServiceProvider(
    $app->getRouteCollector()->getRouteParser()
));


$container->addServiceProvider(new ViewServiceProvider(
    $app->getRouteCollector()->getRouteParser()

));

$container->addServiceProvider(new FServiceProvider());

