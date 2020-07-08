<?php

namespace Intimaai\Models;

use Exception;

class Certificado
{
    private $pfx;
    private $senha;

    /**
     * Certificado constructor.
     * @param string $pfx
     * @param string $senha
     */
    public function __construct($pfx, $senha)
    {
        $this->pfx = $pfx;
        $this->senha = $senha;
    }

    /**
     * @return string
     */
    public function getPfx()
    {
        return $this->pfx;
    }

    /**
     * @param string $pfx
     */
    public function setPfx($pfx)
    {
        $this->pfx = $pfx;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}