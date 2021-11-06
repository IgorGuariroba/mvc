<?php


require __DIR__ . '/../vendor/autoload.php';

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Http\Server\RequestHandlerInterface;

$caminho = $_SERVER['REDIRECT_URL'];

$rotas = require __DIR__ . '/../config/routes.php';
if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit;
}

session_start();

//if (!isset($_SESSION['logado']) && stripos($caminho, 'login') === false) {
//    header('Location: /api/login');
//    exit;
//}

$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);
$request = $creator->fromGlobals();

$classControladora = $rotas[$caminho];
/** @var ContainerExceptionInterface $container */
$container = require __DIR__.'/../config/dependencies.php';
/** @var RequestHandlerInterface $controlador */
$controlador = $container->get($classControladora);
$resposta = $controlador->handle($request);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();