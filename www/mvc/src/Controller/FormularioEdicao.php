<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class FormularioEdicao implements InterfaceControladorRequisicao
{

    /** @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository */
    private $repositorioCursos;

    public function __construct()
    {
        $endetyManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioCursos = $endetyManager->getRepository(Curso::class);
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

        $curso = $this->repositorioCursos->find($id);
        require __DIR__.'/../../view/cursos/formulario.php';
    }
}