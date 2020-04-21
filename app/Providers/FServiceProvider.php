<?php

namespace App\Providers;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Slim\Flash\Messages;


class FServiceProvider extends  AbstractServiceProvider
{

    /**
     * Use the register method to register items with the container via the
     * protected $this->leagueContainer property or the `getLeagueContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */


    /**
     * @var RouteParserInterface
     */

    protected $provides= [
        'flash'
    ];

    public function register()
    {

        $container= $this->getContainer();
        $container->share('flash',function (){
            return new Messages();
        });
    }
}

