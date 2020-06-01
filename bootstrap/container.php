<?php

use App\Providers\ViewServiceProvider;
use App\Providers\FServiceProvider;
use App\Providers\MiddlewareServiceProvider;
use App\Providers\CsrfServiceProvider;


$container->addServiceProvider(new MiddlewareServiceProvider(
    $app->getRouteCollector()->getRouteParser()
));


$container->addServiceProvider(new ViewServiceProvider(
    $app->getRouteCollector()->getRouteParser()

));

$container->addServiceProvider(new CsrfServiceProvider(
    $app->getResponseFactory()

));

$container->addServiceProvider(new FServiceProvider());

