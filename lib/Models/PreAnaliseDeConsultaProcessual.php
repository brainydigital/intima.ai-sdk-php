<?php

namespace Intimaai\Models;

class PreAnaliseDeConsultaProcessual
{
    private $autenticacaoId;
    private $numeroProcesso;
    private $nomeParte;
    private $nomeRepresentante;

    /**
     * PreAnaliseDeConsultaProcessual constructor.
     * @param int $autenticacaoId
     * @param string|null $numeroProcesso
     * @param string|null $nomeParte
     * @param string|null $nomeRepresentante
     */
    public function __construct($autenticacaoId, $numeroProcesso = null, $nomeParte = null, $nomeRepresentante = null)
    {
        $this->autenticacaoId = $autenticacaoId;
        $this->numeroProcesso = $numeroProcesso;
        $this->nomeParte = $nomeParte;
        $this->nomeRepresentante = $nomeRepresentante;
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
}