<?php

namespace Intimaai\Models;

class CopiaProcessual
{
    private $numeroProcesso;
    private $autenticacaoId;

    /**
     * CopiaProcessual constructor.
     * @param string $numeroProcesso
     * @param int $autenticacaoId
     */
    public function __construct($numeroProcesso, $autenticacaoId)
    {
        $this->numeroProcesso = $numeroProcesso;
        $this->autenticacaoId = $autenticacaoId;
    }

    /**
     * @return string
     */
    public function getNumeroProcesso()
    {
        return $this->numeroProcesso;
    }

    /**
     * @param string $numeroProcesso
     */
    public function setNumeroProcesso($numeroProcesso)
    {
        $this->numeroProcesso = $numeroProcesso;
    }

    /**
     * @return int
     */
    public function getAutenticacaoId()
    {
        return $this->autenticacaoId;
    }

    /**
     * @param int $autenticacaoId
     */
    public function setAutenticacaoId($autenticacaoId)
    {
        $this->autenticacaoId = $autenticacaoId;
    }
}