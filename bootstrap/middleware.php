<?php

use Slim\Middleware\ErrorMiddleware;
use Slim\Views\TwigMiddleware;
use Slim\Middleware\MethodOverrideMiddleware;
$errorMiddleware = new ErrorMiddleware(
    $app->getCallableResolver(),

    $app->getResponseFactory(),
    true,
    false,
    false
);

$app->add($errorMiddleware);



$app->add(TwigMiddleware::createFromContainer($app));
$app->add(new MethodOverrideMiddleware());




