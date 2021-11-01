<?php

$rotas = [
    '/api/listar-cursos' => \Alura\Cursos\Controller\ListarCursos::class,
    '/api/novo-curso' => \Alura\Cursos\Controller\FormularioInsercao::class,
    '/api/salvar-curso' => \Alura\Cursos\Controller\Persistencia::class,
];


return $rotas;