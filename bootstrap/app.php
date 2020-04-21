<?php
session_start();
use League\Container\Container;
use Slim\Factory\AppFactory;
use  Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Native\SentinelBootstrapper;

require __DIR__.'/../vendor/autoload.php';

$dotenv =Dotenv\Dotenv::createImmutable(__DIR__,'/../.env');
$dotenv->load();

Sentinel::instance(
    new SentinelBootstrapper(
        require(__DIR__.'/../config/auth.php')
    )
);

$container = new Container();

AppFactory::setContainer($container);

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
require __DIR__.'/container.php';
require __DIR__.'/database.php';
require __DIR__.'/exception.php';
require __DIR__.'/controllers.php';
require __DIR__.'/../routes/web.php';

