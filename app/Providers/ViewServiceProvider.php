<?php

namespace App\Providers;
use App\Views\base;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Odan\Twig\TwigAssetsExtension;
use Slim\Interfaces\RouteParserInterface;
use Slim\Psr7\Factory\UriFactory;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Views\TwigRuntimeLoader;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\PathPackage;
use Twig\Environment;

class ViewServiceProvider extends  AbstractServiceProvider
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
    protected $routeParser;

    public function __construct(RouteParserInterface $routeParser)
    {
            $this->routeParser = $routeParser;

    }

    protected $provides= [
        'view'
    ];

    public function register()
    {
        $container = $this->getContainer();
        $container->add('view',function (){
            $twig = new Twig(__DIR__.'/../../resources/views',[
                'cache' => false
            ]);

            $twig->addRuntimeLoader(
                new TwigRuntimeLoader(
                    $this->routeParser,
                    (new UriFactory)->createFromGlobals($_SERVER)
                )
            );

            $this->registerGlobals($twig);

            $twig->addExtension(new TwigExtension());

            $twig->addExtension(new base());



            return $twig;
        });

    }

    protected function registerGlobals(Twig $twig)
    {
        $container = $this->getContainer();
//
        $twig->getEnvironment()->addGlobal('user',Sentinel::check());
        $twig->getEnvironment()->addGlobal('status',$container->get('flash')->getFirstMessage('status'));
        $twig->getEnvironment()->addGlobal('errors',$container->get('flash')->getFirstMessage('errors'));

    }

}

