<?php

namespace Intimaai\Models;

class Peticao
{
    private $arquivo;
    private $tipoDocumento;
    private $descricaoDocumento;

    /**
     * Peticao constructor.
     * @param string $arquivo
     * @param int|null $tipoDocumento
     * @param string|null $descricaoDocumento
     */
    public function __construct($arquivo, $tipoDocumento = null, $descricaoDocumento = null)
    {
        $this->arquivo = $arquivo;
        $this->tipoDocumento = $tipoDocumento;
        $this->descricaoDocumento = $descricaoDocumento;
    }

    /**
     * @return string
     */
    public function getArquivo()
    {
        return $this->arquivo;
    }

    /**
     * @param string $arquivo
     */
    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;
    }

    /**
     * @return int
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * @param int $tipoDocumento
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    /**
     * @return string
     */
    public function getDescricaoDocumento()
    {
        return $this->descricaoDocumento;
    }

    /**
     * @param string $descricaoDocumento
     */
    public function setDescricaoDocumento($descricaoDocumento)
    {
        $this->descricaoDocumento = $descricaoDocumento;
    }
}