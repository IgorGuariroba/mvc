<?php

namespace Alura\Cursos\Helper;

trait RenderizadorDeHtml
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados);

        ob_start();
        require __DIR__ . '/../../view/' . $caminhoTemplate;

        return ob_get_clean();
    }
}