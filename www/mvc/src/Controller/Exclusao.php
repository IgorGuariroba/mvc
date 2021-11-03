<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMenssageTrait;
use Alura\Cursos\Helper\RenderizadorDeHtml;
use Alura\Cursos\Infra\EntityManagerCreator;

class Exclusao implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtml, FlashMenssageTrait;

    private $endetyManager;

    public function __construct()
    {
        $this->endetyManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processarequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );


        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Curso inexistente');
            header("location: /api/listar-cursos");
            return;
        }

        $curso = $this->endetyManager->getReference(Curso::class, $id);
        $this->endetyManager->remove($curso);
        $this->endetyManager->flush();

        $this->defineMensagem('success', 'Curso excluido com sucesso');

        header("location: /api/listar-cursos");

    }
}