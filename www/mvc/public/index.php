<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;

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
    case "/api/salvar-curso":
        $controlador = new Persistencia();
        $controlador->processaRequisicao();
        break;
    default :
        echo "Erro 404";
endswitch;