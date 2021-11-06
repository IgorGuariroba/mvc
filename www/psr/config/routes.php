<?php


use Alura\Psr\Controller\FormularioInsercao;
use Alura\Psr\Controller\ListarCursos;
use Alura\Psr\Controller\Persistencia;

return [
    '/api-psr/novo-curso' => FormularioInsercao::class,
    '/api-psr/listar-cursos' => ListarCursos::class,
    '/api-psr/salvar-curso' => Persistencia::class
];