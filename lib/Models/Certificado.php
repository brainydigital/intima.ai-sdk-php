<?php

namespace Intimaai\Models;

class Certificado
{
    private $pfx;
    private $password;

    /**
     * Certificado constructor.
     * @param string $pfx
     * @param string $password
     * @throws \Exception
     */
    public function __construct($pfx, $password)
    {
        $this->pfx = $pfx;
        $this->password = $password;

        $this->validate();
    }

    private function validate()
    {
        if (!file_exists($this->pfx))
        {
            throw new \Exception('O caminho do arquivo informado é inválido!');
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}