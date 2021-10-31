<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;

switch ($_SERVER['REQUEST_URI']):
    case "/api/listar-cursos":
    case "/api/":
    case "/api":
        $controlador = new ListarCursos();
        $controlador->processaRequisicao();
        break;
    case "/api/novo-curso":
    case "/api/novo-curso/":
        $controlador = new FormularioInsercao();
        $controlador->processaRequisicao();
        break;
    default :
        echo "Erro 404";
endswitch;