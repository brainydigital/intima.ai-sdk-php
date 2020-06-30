<?php

namespace Intimaai\Models;

class NovaAutenticacao
{
    private $tribunalId;
    private $certificadoId;
    private $login;
    private $senha;

    /**
     * NovaAutenticacao constructor.
     * @param int $tribunalId
     * @param int|null $certificadoId
     * @param string|null $login
     * @param string|null $senha
     */
    public function __construct($tribunalId, $certificadoId = null, $login = null, $senha = null)
    {
        $this->tribunalId = $tribunalId;
        $this->certificadoId = $certificadoId;
        $this->login = $login;
        $this->senha = $senha;
    }

    /**
     * @return int
     */
    public function getTribunalId()
    {
        return $this->tribunalId;
    }

    /**
     * @param int $tribunalId
     */
    public function setTribunalId($tribunalId)
    {
        $this->tribunalId = $tribunalId;
    }

    /**
     * @return int|null
     */
    public function getCertificadoId()
    {
        return $this->certificadoId;
    }

    /**
     * @param int|null $certificadoId
     */
    public function setCertificadoId($certificadoId)
    {
        $this->certificadoId = $certificadoId;
    }

    /**
     * @return string|null
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string|null $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string|null
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string|null $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}