<?php
namespace App\Middleware;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Flash\Messages;
use Slim\Interfaces\RouteParserInterface;


class RedirectIfGuest
{
    /**
     * @var RouteParserInterface
     */
    private $routeParser;
    /**
     * @var Messages
     */
    private $flash;

    public function __construct(Messages $flash , RouteParserInterface $routeParser)
    {
        $this->flash = $flash;
        $this->routeParser = $routeParser;
    }

    public function __invoke(Request $request,RequestHandlerInterface $handler)
    {
            $response  = $handler->handle($request);
            if (Sentinel::guest()){
               $this->flash->addMessage('status','Login Please');
               $response= $response->withHeader(
                   'Location',$this->routeParser->urlFor('auth.login')
               );

            }
            return $response;
    }
}
