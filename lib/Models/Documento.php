<?php

namespace Intimaai\Models;

use Exception;

class Documento
{
    private $arquivo;
    private $tipoDocumento;
    private $descricaoDocumento;
    private $ordem;

    /**
     * Documento constructor.
     * @param string $arquivo
     * @param int $tipoDocumento
     * @param string $descricaoDocumento
     * @param int $ordem
     * @throws Exception
     */
    public function __construct($arquivo, $tipoDocumento, $descricaoDocumento, $ordem)
    {
        $this->arquivo = $arquivo;
        $this->tipoDocumento = $tipoDocumento;
        $this->descricaoDocumento = $descricaoDocumento;
        $this->ordem = $ordem;

        $this->validate();
    }

    private function validate()
    {
        if (!file_exists($this->arquivo))
        {
            throw new Exception('O caminho do arquivo informado é inválido!');
        }
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

    /**
     * @return int
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * @param int $ordem
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
    }
}