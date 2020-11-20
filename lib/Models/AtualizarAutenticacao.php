<?php

namespace Intimaai\Models;

class AtualizarAutenticacao
{
    private $oabNumero;
    private $oabLetra;
    private $oabUf;

    /**
     * AtualizarAutenticacao constructor.
     * @param string|null $oabNumero
     * @param string|null $oabLetra
     * @param string|null $oabUf
     */
    public function __construct($oabNumero = null, $oabLetra = null, $oabUf = null)
    {
        $this->oabNumero = $oabNumero;
        $this->oabLetra = $oabLetra;
        $this->oabUf = $oabUf;
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