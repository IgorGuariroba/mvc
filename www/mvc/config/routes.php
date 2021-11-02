<?php

use Alura\Cursos\Controller\{Exclusao,
    FormularioEdicao,
    FormularioInsercao,
    FormularioLogin,
    ListarCursos,
    Persistencia,
    RealizarLogin};

return [
    '/api/listar-cursos' => ListarCursos::class,
    '/api/novo-curso' => FormularioInsercao::class,
    '/api/salvar-curso' => Persistencia::class,
    '/api/excluir-curso' => Exclusao::class,
    '/api/alterar-curso' => FormularioEdicao::class,
    '/api/login' => FormularioLogin::class,
    '/api/realiza-login' => RealizarLogin::class,
];