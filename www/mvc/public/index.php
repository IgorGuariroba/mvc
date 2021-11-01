<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\InterfaceControladorRequisicao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;

$caminho = $_SERVER['REDIRECT_URL'];
$rotas = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($caminho,$rotas)){
    http_response_code(404);
    exit;
}

$classControladora = $rotas[$caminho];
/** @var InterfaceControladorRequisicao $controlador */
$controlador = new $classControladora();
$controlador->processaRequisicao();

