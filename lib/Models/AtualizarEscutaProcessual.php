<?php

namespace Intimaai\Models;

class AtualizarEscutaProcessual
{
    private $diasDeCaptura;

    private $horariosDeCaptura;

    /**
     * AtualizarEscutaProcessual constructor.
     * @param array $horariosDeCaptura
     */
    public function __construct($diasDeCaptura, $horariosDeCaptura)
    {
        $this->diasDeCaptura = $diasDeCaptura;
        $this->horariosDeCaptura = $horariosDeCaptura;
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