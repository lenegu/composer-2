<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/getUsers/{name}', function (Request $request, Response $response, $args) {
	$dep = require __DIR__. '/../bootstrap/container.php';

  $name= $args['name'];
  $userManager = $dep->get('UserManager');
  $response
  ->withHeader('Content-Type', 'application/json;charset=utf-8')
  ->getBody()
  ->write(json_encode($userManager->getAllUsersWhere($name), JSON_UNESCAPED_UNICODE));
  $renderer = new PhpRenderer('templates');
    return $renderer->render($response, "index.html");
});

$app->get('/', function (Request $request, Response $response){
	$renderer = new PhpRenderer('templates');
    return $renderer->render($response, "index.html");
});

$app->run();

