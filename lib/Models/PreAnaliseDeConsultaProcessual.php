<?php

namespace Intimaai\Models;

class PreAnaliseDeConsultaProcessual
{
    private $autenticacaoId;
    private $numeroProcesso;
    private $nomeParte;
    private $nomeRepresentante;
    private $oabNumero;
    private $oabLetra;
    private $oabUf;

    /**
     * PreAnaliseDeConsultaProcessual constructor.
     * @param int $autenticacaoId
     * @param string|null $numeroProcesso
     * @param string|null $nomeParte
     * @param string|null $nomeRepresentante
     * @param string|null $oabNumero
     * @param string|null $oabLetra
     * @param string|null $oabUf
     */
    public function __construct($autenticacaoId, $numeroProcesso = null, $nomeParte = null, $nomeRepresentante = null, $oabNumero = null, $oabLetra = null, $oabUf = null)
    {
        $this->autenticacaoId = $autenticacaoId;
        $this->numeroProcesso = $numeroProcesso;
        $this->nomeParte = $nomeParte;
        $this->nomeRepresentante = $nomeRepresentante;
        $this->oabNumero = $oabNumero;
        $this->oabLetra = $oabLetra;
        $this->oabUf = $oabUf;
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

    /**
     * @return string|null
     */
    public function getNumeroProcesso()
    {
        return $this->numeroProcesso;
    }

    /**
     * @param string|null $numeroProcesso
     */
    public function setNumeroProcesso($numeroProcesso)
    {
        $this->numeroProcesso = $numeroProcesso;
    }

    /**
     * @return string|null
     */
    public function getNomeParte()
    {
        return $this->nomeParte;
    }

    /**
     * @param string|null $nomeParte
     */
    public function setNomeParte($nomeParte)
    {
        $this->nomeParte = $nomeParte;
    }

    /**
     * @return string|null
     */
    public function getNomeRepresentante()
    {
        return $this->nomeRepresentante;
    }

    /**
     * @param string|null $nomeRepresentante
     */
    public function setNomeRepresentante($nomeRepresentante)
    {
        $this->nomeRepresentante = $nomeRepresentante;
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