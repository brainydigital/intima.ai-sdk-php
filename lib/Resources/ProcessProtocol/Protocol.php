<?php

namespace Intimaai\Resources\ProcessProtocol;

use Intimaai\Resources\ProcessQualificationProtocol\Document;

class Protocol
{
    private $processNumber;
    private $authId;
    private $tipoDocumentoMensagemGeral;
    private $descricao;
    private $mensagem_geral;
    private $peticao;
    private $documentos;

    /**
     * Protocol constructor.
     * @param string $processNumber
     * @param int $authId
     * @param int $tipoDocumentoMensagemGeral
     * @param string|null $descricao
     * @param string|null $mensagem_geral
     * @param Peticao|null $peticao
     * @param Document[]|null $documentos
     */
    public function __construct($processNumber, $authId, $tipoDocumentoMensagemGeral, $descricao = null, $mensagem_geral = null, $peticao = null, $documentos = null)
    {
        $this->processNumber = $processNumber;
        $this->authId = $authId;
        $this->tipoDocumentoMensagemGeral = $tipoDocumentoMensagemGeral;
        $this->descricao = $descricao;
        $this->mensagem_geral = $mensagem_geral;
        $this->peticao = $peticao;
        $this->documentos = $documentos;
    }

    /**
     * @return string
     */
    public function getProcessNumber()
    {
        return $this->processNumber;
    }

    /**
     * @param string $processNumber
     */
    public function setProcessNumber($processNumber)
    {
        $this->processNumber = $processNumber;
    }

    /**
     * @return int
     */
    public function getAuthId()
    {
        return $this->authId;
    }

    /**
     * @param int $authId
     */
    public function setAuthId($authId)
    {
        $this->authId = $authId;
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
        return $this->mensagem_geral;
    }

    /**
     * @param string|null $mensagem_geral
     */
    public function setMensagemGeral($mensagem_geral)
    {
        $this->mensagem_geral = $mensagem_geral;
    }

    /**
     * @return Peticao|null
     */
    public function getPeticao()
    {
        return $this->peticao;
    }

    /**
     * @param Peticao|null $peticao
     */
    public function setPeticao($peticao)
    {
        $this->peticao = $peticao;
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