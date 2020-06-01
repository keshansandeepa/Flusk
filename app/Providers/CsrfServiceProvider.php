<?php


namespace App\Providers;


use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Csrf\Guard;
use Slim\Flash\Messages;

class CsrfServiceProvider extends AbstractServiceProvider
{


    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    public function __construct(ResponseFactoryInterface $responseFactory)
    {

        $this->responseFactory = $responseFactory;

    }

    protected $provides= [
        'csrf'
    ];

    public function register()
    {

        $container= $this->getContainer();
        $container->add('csrf',function (){
            return new Guard();
        });
    }
}
