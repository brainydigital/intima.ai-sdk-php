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
     * @throws Exception
     */
    public function __construct($pfx, $senha)
    {
        $this->pfx = $pfx;
        $this->senha = $senha;

        $this->validate();
    }

    private function validate()
    {
        if (!file_exists($this->pfx))
        {
            throw new Exception('O caminho do arquivo informado é inválido!');
        }
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