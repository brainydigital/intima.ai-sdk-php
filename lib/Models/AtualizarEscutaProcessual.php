<?php

namespace Intimaai\Models;

class AtualizarEscutaProcessual
{
    private $horariosDeCaptura;

    /**
     * AtualizarEscutaProcessual constructor.
     * @param array $horariosDeCaptura
     */
    public function __construct($horariosDeCaptura)
    {
        $this->horariosDeCaptura = $horariosDeCaptura;
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