<?php
namespace App\Middleware;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Flash\Messages;
use Slim\Interfaces\RouteParserInterface;


class RedirectIfAuthenticated
{




    public function __invoke(Request $request, RequestHandlerInterface $handler)
    {
        $response  = $handler->handle($request);
        if (!Sentinel::guest()){
            $response= $response->withHeader(
                'Location','/'
            );

        }
        return $response;
    }
}
