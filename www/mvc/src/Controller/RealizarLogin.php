<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin extends ControllerComHtml implements InterfaceControladorRequisicao
{
    /** @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository */
    private $repositorioDeUsuariros;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeUsuariros = $entityManager->getRepository(Usuario::class);
    }

    public function processarequisicao(): void
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );

        if (is_null($email) || $email === false) {
            $usuario = $this->repositorioDeUsuariros
                ->findOneBy(['email' => '123']);

            if (is_null($usuario) || !$usuario->senhaEstaCorreta('kkkkpppp')) {
                echo "Email ou senha invalido";
            }

            header('Location: /api/login');
            return;
        }
        /** @var Usuario $usuario */
        $usuario = $this->repositorioDeUsuariros
            ->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            echo "Email ou senha invalido";
            return;
        }

        header('Location: /api/listar-cursos');
    }
}