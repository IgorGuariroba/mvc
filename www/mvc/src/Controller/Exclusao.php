<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Exclusao implements InterfaceControladorRequisicao
{

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
            header("location: /api/listar-cursos");
            return;
        }

        $curso = $this->endetyManager->getReference(Curso::class, $id);
        $this->endetyManager->remove($curso);
        $this->endetyManager->flush();

        header("location: /api/listar-cursos");

    }
}