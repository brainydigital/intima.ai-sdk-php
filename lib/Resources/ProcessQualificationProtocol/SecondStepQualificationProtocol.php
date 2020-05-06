<?php

namespace Intimaai\Resources\ProcessQualificationProtocol;


class SecondStepQualificationProtocol
{
    private $tipoSolicitacao;
    private $tipoDeclaracao;
    private $polo;
    private $partesVinculadas;
    private $tipoDocumentoMensagemGeral;

    private $descricao;
    private $mensagemGeral;
    private $documentos;

    /**
     * SecondStepQualificationProtocol constructor.
     * @param int $tipoSolicitacao
     * @param int $tipoDeclaracao
     * @param int $polo
     * @param array $partesVinculadas
     * @param int $tipoDocumentoMensagemGeral
     * @param string $descricao
     * @param string $mensagemGeral
     * @param Document[] $documentos
     */
    public function __construct($tipoSolicitacao, $tipoDeclaracao, $polo, $partesVinculadas, $tipoDocumentoMensagemGeral, $descricao = null, $mensagemGeral = null, $documentos = null)
    {
        $this->tipoSolicitacao = $tipoSolicitacao;
        $this->tipoDeclaracao = $tipoDeclaracao;
        $this->polo = $polo;
        $this->partesVinculadas = $partesVinculadas;
        $this->tipoDocumentoMensagemGeral = $tipoDocumentoMensagemGeral;
        $this->descricao = $descricao;
        $this->mensagemGeral = $mensagemGeral;
        $this->documentos = $documentos;
    }

    /**
     * @return int
     */
    public function getTipoSolicitacao()
    {
        return $this->tipoSolicitacao;
    }

    /**
     * @param int $tipoSolicitacao
     */
    public function setTipoSolicitacao($tipoSolicitacao)
    {
        $this->tipoSolicitacao = $tipoSolicitacao;
    }

    /**
     * @return int
     */
    public function getTipoDeclaracao()
    {
        return $this->tipoDeclaracao;
    }

    /**
     * @param int $tipoDeclaracao
     */
    public function setTipoDeclaracao($tipoDeclaracao)
    {
        $this->tipoDeclaracao = $tipoDeclaracao;
    }

    /**
     * @return int
     */
    public function getPolo()
    {
        return $this->polo;
    }

    /**
     * @param int $polo
     */
    public function setPolo($polo)
    {
        $this->polo = $polo;
    }

    /**
     * @return array
     */
    public function getPartesVinculadas()
    {
        return $this->partesVinculadas;
    }

    /**
     * @param array $partesVinculadas
     */
    public function setPartesVinculadas($partesVinculadas)
    {
        $this->partesVinculadas = $partesVinculadas;
    }

    /**
     * @return int
     */
    public function getTipoDocumentoMensagemGeral()
    {
        return $this->tipoDocumentoMensagemGeral;
    }

    /**
     * @param int $tipoDocumentoMensagemGeral
     */
    public function setTipoDocumentoMensagemGeral($tipoDocumentoMensagemGeral)
    {
        $this->tipoDocumentoMensagemGeral = $tipoDocumentoMensagemGeral;
    }

    /**
     * @return string|null
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string|null $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return string|null
     */
    public function getMensagemGeral()
    {
        return $this->mensagemGeral;
    }

    /**
     * @param string|null $mensagemGeral
     */
    public function setMensagemGeral($mensagemGeral)
    {
        $this->mensagemGeral = $mensagemGeral;
    }

    /**
     * @return Document[]|null
     */
    public function getDocumentos()
    {
        return $this->documentos;
    }

    /**
     * @param Document[]|null $documentos
     */
    public function setDocumentos($documentos)
    {
        $this->documentos = $documentos;
    }
}