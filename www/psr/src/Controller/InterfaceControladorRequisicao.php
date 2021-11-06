<?php

namespace Alura\Psr\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface InterfaceControladorRequisicao
{
    public function processarequisicao(ServerRequestInterface $request): ResponseInterface;
}