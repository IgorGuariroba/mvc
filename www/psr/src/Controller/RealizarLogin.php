<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMenssageTrait;
use Alura\Cursos\Helper\RenderizadorDeHtml;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtml, FlashMenssageTrait;

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
                $this->defineMensagem('danger', 'Email ou senha invalido');
            }

            header('Location: /api/login');
            return;
        }
        /** @var Usuario $usuario */
        $usuario = $this->repositorioDeUsuariros
            ->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem('danger', 'Email ou senha invalido');
            header('Location: /api/login');
            return;
        }

        $_SESSION['logado'] = true;

        header('Location: /api/listar-cursos');
    }
}