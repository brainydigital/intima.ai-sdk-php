<?php

namespace Intimaai\Models;

class EscutaProcessual
{
    private $numeroProcesso;

    private $autenticacaoId;

    private $horariosDeCaptura;

    /**
     * EscutaProcessual constructor.
     * @param string $numeroProcesso
     * @param int $autenticacaoId
     * @param array $horariosDeCaptura
     */
    public function __construct($numeroProcesso, $autenticacaoId, $horariosDeCaptura)
    {
        $this->numeroProcesso = $numeroProcesso;
        $this->autenticacaoId = $autenticacaoId;
        $this->horariosDeCaptura = $horariosDeCaptura;
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
     * @return array
     */
    public function getHorariosDeCaptura()
    {
        return $this->horariosDeCaptura;
    }

    /**
     * @param array $horariosDeCaptura
     */
    public function setHorariosDeCaptura($horariosDeCaptura)
    {
        $this->horariosDeCaptura = $horariosDeCaptura;
    }
}