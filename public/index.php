<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use OatAPI\Controller\TestMakerGetController;
use OatAPI\Controller\TestMakersGetController;
use FastRoute\RouteCollector;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Narrowspark\HttpEmitter\SapiEmitter;
use Relay\Relay;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);
$containerBuilder->addDefinitions([
    TestTakers::class => \DI\create(TestTakers::class)
        ->constructor(\DI\get('data'), \DI\get('Response')),
        'data' => array('d' => 'users'),
        'Response' => function() {
            return new Response();
        },
]);

$container = $containerBuilder->build();

$routes = \FastRoute\simpleDispatcher(function (RouteCollector $routeCollector) {
    $routeCollector->get('/users', TestMakersGetController::class);
    $routeCollector->get('/user/{id:\d+}', TestMakerGetController::class);
});

$middlewareQueue = [];
$middlewareQueue[] = new FastRoute($routes);
$middlewareQueue[] = new RequestHandler($container);

$requestHandler = new Relay($middlewareQueue);
$response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

$emitter = new SapiEmitter();
return $emitter->emit($response);
