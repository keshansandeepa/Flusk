<?php

use Slim\Middleware\ErrorMiddleware;
use Slim\Views\TwigMiddleware;
use App\Exception\ExceptionHandler;

$errorMiddleware = $app->addErrorMiddleware(true,true,true);

$errorMiddleware->setDefaultErrorHandler(
        new  ExceptionHandler(
            $app->getResponseFactory(),
            $container->get('flash'),
            $container->get('view')
        )
);
