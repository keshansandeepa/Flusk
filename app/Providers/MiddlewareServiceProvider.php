<?php
namespace App\Providers;
use App\Middleware\RedirectIfAuthenticated;
use FastRoute\RouteParser;
use League\Container\ServiceProvider\AbstractServiceProvider;
use App\Middleware\RedirectIfGuest;
use Slim\Interfaces\RouteParserInterface;
use Slim\Interfaces\RouteResolverInterface;

class MiddlewareServiceProvider extends AbstractServiceProvider
{

    /**
     * @var RouteResolverInterface
     */
    private $routeParser;

    public function __construct(RouteParserInterface $routeParser)
    {
        $this->routeParser = $routeParser;
    }

    protected $provides=[
        RedirectIfGuest::class
    ];
    /**
     * Use the register method to register items with the container via the
     * protected $this->leagueContainer property or the `getLeagueContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        $container = $this->getContainer();

        $container->add(RedirectIfGuest::class,function () use ($container) {
            return new RedirectIfGuest(
                $container->get('flash'),
                $this->routeParser

            );
        });

        $container->add(RedirectIfAuthenticated::class,function () use ($container) {
            return new RedirectIfGuest();
        });
    }
}
