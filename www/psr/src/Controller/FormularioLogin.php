<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHtml;

class FormularioLogin implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtml;

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