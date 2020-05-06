<?php

namespace Intimaai\Resources\ProcessQualificationProtocol;


class Document
{
    private $arquivo;
    private $tipoDocumento;
    private $descricaoDocumento;
    private $order;

    /**
     * Document constructor.
     * @param string $arquivo
     * @param int $tipoDocumento
     * @param string $descricaoDocumento
     * @param int $order
     * @throws \Exception
     */
    public function __construct($arquivo, $tipoDocumento, $descricaoDocumento, $order)
    {
        $this->arquivo = $arquivo;
        $this->tipoDocumento = $tipoDocumento;
        $this->descricaoDocumento = $descricaoDocumento;
        $this->order = $order;

        $this->validate();
    }

    private function validate()
    {
        if (!file_exists($this->arquivo))
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

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
}