<?php

namespace Alura\Cursos\Controller;

class FormularioLogin extends ControllerComHtml implements InterfaceControladorRequisicao
{

    public function processarequisicao(): void
    {
        echo $this->renderizaHtml(
            'login/formulario.php',
            [
                "titulo" => "Login"
            ]
        );
    }
}