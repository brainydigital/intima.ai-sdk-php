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
     * @param int $tipoDocumento
     * @param string|null $descricaoDocumento
     */
    public function __construct($arquivo, $tipoDocumento, $descricaoDocumento = null)
    {
        $this->arquivo = $arquivo;
        $this->tipoDocumento = $tipoDocumento;
        $this->descricaoDocumento = $descricaoDocumento;

        $this->validate($arquivo);
    }

    private function validate($filePath)
    {
        if (!file_exists($filePath))
        {
            throw new \Exception('O caminho do arquivo informado é inválido!');
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
}