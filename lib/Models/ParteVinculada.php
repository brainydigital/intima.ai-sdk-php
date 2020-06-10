<?php

namespace Intimaai\Models;

class ParteVinculada
{
    private $nome;
    private $participacao;

    /**
     * ParteVinculada constructor.
     * @param string $nome
     * @param string|null $participacao
     */
    public function __construct($nome, $participacao = null)
    {
        $this->nome = $nome;
        $this->participacao = $participacao;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string|null
     */
    public function getParticipacao()
    {
        return $this->participacao;
    }

    /**
     * @param string|null $participacao
     */
    public function setParticipacao($participacao)
    {
        $this->participacao = $participacao;
    }
}