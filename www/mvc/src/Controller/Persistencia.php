<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processarequisicao(): void
    {
        $decricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        $curso = new Curso();
        $curso->setDescricao($decricao);

        if (!is_null($id) && $id !== false) {
            $this->atualiza($curso, $id);
            header('Location: /api/listar-cursos', true, 302);
            return;
        }

        $this->entityManager->persist($curso);
        $this->entityManager->flush();

        header('Location: /api/listar-cursos', true, 302);
    }

    private function atualiza(Curso $curso, int $id)
    {
        $curso->setId($id);
        $this->entityManager->merge($curso);
        $this->entityManager->flush();
    }
}