<?php

namespace Alura\Cursos\Controller;

class Deslogar  implements InterfaceControladorRequisicao
{

    public function processarequisicao(): void
    {
        session_destroy();
        header('Location: /api/login');
    }
}