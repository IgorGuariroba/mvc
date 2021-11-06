<?php


use Alura\Psr\Controller\FormularioInsercao;
use Alura\Psr\Controller\ListarCursos;

return [
    '/api-psr/novo-curso' => FormularioInsercao::class,
    '/api-psr/listar-cursos' => ListarCursos::class
];