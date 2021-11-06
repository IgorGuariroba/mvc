<?php

namespace Alura\Psr\Controller;


use Alura\Psr\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    private function atualiza(Curso $curso, int $id)
    {
        $curso->setId($id);
        $this->entityManager->merge($curso);
        $this->entityManager->flush();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $decricao = filter_var(
            $request->getParsedBody()['descricao'],
            FILTER_SANITIZE_STRING
        );

        $id = filter_input(
            $request->getParsedBody()['id'],
            FILTER_VALIDATE_INT
        );

        $curso = new Curso();
        $curso->setDescricao($decricao);

        if (!is_null($id) && $id !== false) {
            $this->atualiza($curso, $id);
            return new Response(302, ['Location' => '/api-psr/listar-cursos']);
        }

        if(empty($decricao)){
            return new Response(302, ['Location' => '/api-psr/listar-cursos']);
        }

        $this->entityManager->persist($curso);
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/api-psr/listar-cursos']);

    }
}