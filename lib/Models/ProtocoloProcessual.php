<?php

namespace Intimaai\Models;

class ProtocoloProcessual
{
    private $numeroProcesso;
    private $autenticacaoId;
    private $tipoDocumentoMensagemGeral;
    private $descricao;
    private $mensagemGeral;
    private $peticao;
    private $documentos;

    /**
     * ProtocoloProcessual constructor.
     * @param string $numeroProcesso
     * @param int $autenticacaoId
     * @param int $tipoDocumentoMensagemGeral
     * @param string|null $descricao
     * @param string|null $mensagemGeral
     * @param Peticao|null $peticao
     * @param Documento[]|null $documentos
     */
    public function __construct($numeroProcesso, $autenticacaoId, $tipoDocumentoMensagemGeral, $descricao = null, $mensagemGeral = null, $peticao = null, $documentos = null)
    {
        $this->numeroProcesso = $numeroProcesso;
        $this->autenticacaoId = $autenticacaoId;
        $this->tipoDocumentoMensagemGeral = $tipoDocumentoMensagemGeral;
        $this->descricao = $descricao;
        $this->mensagemGeral = $mensagemGeral;
        $this->peticao = $peticao;
        $this->documentos = $documentos;
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
     * @return Documento[]|null
     */
    public function getDocumentos()
    {
        return $this->documentos;
    }

    /**
     * @param Documento[]|null $documentos
     */
    public function setDocumentos($documentos)
    {
        $this->documentos = $documentos;
    }
}