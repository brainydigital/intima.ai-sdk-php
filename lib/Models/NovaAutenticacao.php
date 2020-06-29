<?php

namespace Intimaai\Models;

class NovaAutenticacao
{
    private $tribunalId;
    private $certificadoId;
    private $login;
    private $password;

    /**
     * NovaAutenticacao constructor.
     * @param int $tribunalId
     * @param int|null $certificadoId
     * @param string|null $login
     * @param string|null $password
     */
    public function __construct($tribunalId, $certificadoId = null, $login = null, $password = null)
    {
        $this->tribunalId = $tribunalId;
        $this->certificadoId = $certificadoId;
        $this->login = $login;
        $this->password = $password;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}