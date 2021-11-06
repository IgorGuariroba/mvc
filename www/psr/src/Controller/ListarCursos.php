<?php

namespace Alura\Psr\Controller;


use Alura\Psr\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarCursos implements RequestHandlerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $classCurso = $this->entityManager->getRepository(Curso::class);
        $listaCursos = $classCurso->findAll();
        $cursos = [];

        foreach ($listaCursos as $curso) {
            array_push($cursos, [
                "id" => $curso->getId(),
                "descricao" => $curso->getDescricao()
            ]);
        }

        return new Response(200, [], json_encode($cursos));
    }
}