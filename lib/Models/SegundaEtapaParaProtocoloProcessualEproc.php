<?php

namespace Intimaai\Models;

class SegundaEtapaParaProtocoloProcessualEproc
{
    private $tipoDocumentoMensagemGeral;
    private $partesVinculadas;
    private $documentos;

    /**
     * SegundaEtapaParaProtocoloProcessualEproc constructor.
     * @param int $tipoDocumentoMensagemGeral
     * @param ParteVinculada[] $partesVinculadas
     * @param Documento[]|null $documentos
     */
    public function __construct($tipoDocumentoMensagemGeral, $partesVinculadas, $documentos = null)
    {
        $this->tipoDocumentoMensagemGeral = $tipoDocumentoMensagemGeral;
        $this->partesVinculadas = $partesVinculadas;
        $this->documentos = $documentos;
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
     * @return ParteVinculada[]
     */
    public function getPartesVinculadas()
    {
        return $this->partesVinculadas;
    }

    /**
     * @param ParteVinculada[] $partesVinculadas
     */
    public function setPartesVinculadas($partesVinculadas)
    {
        $this->partesVinculadas = $partesVinculadas;
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