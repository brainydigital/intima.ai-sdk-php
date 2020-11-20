<?php

namespace Intimaai\Models;

class NovaAutenticacao
{
    private $tribunalId;
    private $certificadoId;
    private $login;
    private $senha;
    private $oabNumero;
    private $oabLetra;
    private $oabUf;

    /**
     * NovaAutenticacao constructor.
     * @param int $tribunalId
     * @param int|null $certificadoId
     * @param string|null $login
     * @param string|null $senha
     * @param string|null $oabNumero
     * @param string|null $oabLetra
     * @param string|null $oabUf
     */
    public function __construct($tribunalId, $certificadoId = null, $login = null, $senha = null, $oabNumero = null, $oabLetra = null, $oabUf = null)
    {
        $this->tribunalId = $tribunalId;
        $this->certificadoId = $certificadoId;
        $this->login = $login;
        $this->senha = $senha;
        $this->oabNumero = $oabNumero;
        $this->oabLetra = $oabLetra;
        $this->oabUf = $oabUf;
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

    /**
     * @return string|null
     */
    public function getOabNumero()
    {
        return $this->oabNumero;
    }

    /**
     * @param string|null $oabNumero
     */
    public function setOabNumero($oabNumero)
    {
        $this->oabNumero = $oabNumero;
    }

    /**
     * @return string|null
     */
    public function getOabLetra()
    {
        return $this->oabLetra;
    }

    /**
     * @param string|null $oabLetra
     */
    public function setOabLetra($oabLetra)
    {
        $this->oabLetra = $oabLetra;
    }

    /**
     * @return string|null
     */
    public function getOabUf()
    {
        return $this->oabUf;
    }

    /**
     * @param string|null $oabUf
     */
    public function setOabUf($oabUf)
    {
        $this->oabUf = $oabUf;
    }
}