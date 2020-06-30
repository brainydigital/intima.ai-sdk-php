<?php

namespace Intimaai\Models;

class AtivarIntimacoesParaAutenticacao
{
    private $abas;
    private $diasDaSemana;
    private $horasDoDia;

    /**
     * AtivarIntimacoesParaAutenticacao constructor.
     * @param array $abas
     * @param array $diasDaSemana
     * @param array $horasDoDia
     */
    public function __construct($abas, $diasDaSemana, $horasDoDia)
    {
        $this->abas = $abas;
        $this->diasDaSemana = $diasDaSemana;
        $this->horasDoDia = $horasDoDia;
    }

    /**
     * @return array
     */
    public function getAbas()
    {
        return $this->abas;
    }

    /**
     * @param array $abas
     */
    public function setAbas($abas)
    {
        $this->abas = $abas;
    }

    /**
     * @return array
     */
    public function getDiasDaSemana()
    {
        return $this->diasDaSemana;
    }

    /**
     * @param array $diasDaSemana
     */
    public function setDiasDaSemana($diasDaSemana)
    {
        $this->diasDaSemana = $diasDaSemana;
    }

    /**
     * @return array
     */
    public function getHorasDoDia()
    {
        return $this->horasDoDia;
    }

    /**
     * @param array $horasDoDia
     */
    public function setHorasDoDia($horasDoDia)
    {
        $this->horasDoDia = $horasDoDia;
    }
}