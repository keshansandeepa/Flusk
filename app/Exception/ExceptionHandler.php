<?php
namespace App\Exception;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseFactoryInterface as Response;
use Slim\Exception\HttpNotFoundException;
use Slim\Flash\Messages;
use Slim\Psr7\Factory\ResponseFactory;
use Slim\Views\Twig;
use Throwable;


class ExceptionHandler{

    protected $flash;
    protected $response;
    private $view;

    public function __construct(Response $response, Messages $flash, Twig $view)
    {

        $this->flash = $flash;
        $this->response = $response;
        $this->view = $view;

    }

    public function __invoke(Request $request, Throwable $exception)
    {
          if ($exception instanceof ValidationException)
          {
              $this->flash->addMessage('errors',$exception->getErrors());

              return $this->response->createResponse()->withHeader('location',$exception->getPath());

          }

          if ($exception instanceof HttpNotFoundException)
          {

              return $this->view->render(
                  $this->response->createResponse(),
                  'errors/404.twig'
              );
          }

          throw $exception;
    }
}
