<?php

namespace Intimaai\Models;

class SegundaEtapaParaProtocoloProcessualEsaj
{
    private $classeId;
    private $categoriaId;
    private $partesVinculadas;
    private $peticao;
    private $documentos;

    /**
     * SegundaEtapaParaProtocoloProcessualEsaj constructor.
     * @param int $classeId
     * @param int $categoriaId
     * @param ParteVinculada[] $partesVinculadas
     * @param Peticao $peticao
     * @param Documento[]|null $documentos
     */
    public function __construct($classeId, $categoriaId, $partesVinculadas, $peticao, $documentos = null)
    {
        $this->classeId = $classeId;
        $this->categoriaId = $categoriaId;
        $this->partesVinculadas = $partesVinculadas;
        $this->peticao = $peticao;
        $this->documentos = $documentos;
    }

    /**
     * @return int
     */
    public function getClasseId()
    {
        return $this->classeId;
    }

    /**
     * @param int $classeId
     */
    public function setClasseId($classeId)
    {
        $this->classeId = $classeId;
    }

    /**
     * @return int
     */
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    /**
     * @param int $categoriaId
     */
    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;
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
     * @return Peticao
     */
    public function getPeticao()
    {
        return $this->peticao;
    }

    /**
     * @param Peticao $peticao
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