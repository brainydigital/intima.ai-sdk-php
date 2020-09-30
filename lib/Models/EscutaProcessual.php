<?php

namespace Intimaai\Models;

class EscutaProcessual
{
    private $numeroProcesso;

    private $autenticacaoId;

    private $diasDeCaptura;

    private $horariosDeCaptura;

    /**
     * EscutaProcessual constructor.
     * @param string $numeroProcesso
     * @param int $autenticacaoId
     * @param array $horariosDeCaptura
     */
    public function __construct($numeroProcesso, $autenticacaoId, $diasDeCaptura, $horariosDeCaptura)
    {
        $this->numeroProcesso = $numeroProcesso;
        $this->autenticacaoId = $autenticacaoId;
        $this->diasDeCaptura = $diasDeCaptura;
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
    public function getDiasDeCaptura()
    {
        return $this->diasDeCaptura;
    }

    /**
     * @param array $diasDeCaptura
     */
    public function setDiasDeCaptura($diasDeCaptura)
    {
        $this->diasDeCaptura = $diasDeCaptura;
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