<?php

namespace Intimaai\Models;

class AtivarIntimacoesParaAutenticacao
{
    private $tabs;
    private $weekDays;
    private $dayHour;

    /**
     * AtivarIntimacoesParaAutenticacao constructor.
     * @param array $tabs
     * @param array $weekDays
     * @param array $dayHour
     */
    public function __construct($tabs, $weekDays, $dayHour)
    {
        $this->tabs = $tabs;
        $this->weekDays = $weekDays;
        $this->dayHour = $dayHour;
    }

    /**
     * @return array
     */
    public function getTabs()
    {
        return $this->tabs;
    }

    /**
     * @param array $tabs
     */
    public function setTabs($tabs)
    {
        $this->tabs = $tabs;
    }

    /**
     * @return array
     */
    public function getWeekDays()
    {
        return $this->weekDays;
    }

    /**
     * @param array $weekDays
     */
    public function setWeekDays($weekDays)
    {
        $this->weekDays = $weekDays;
    }

    /**
     * @return array
     */
    public function getDayHour()
    {
        return $this->dayHour;
    }

    /**
     * @param array $dayHour
     */
    public function setDayHour($dayHour)
    {
        $this->dayHour = $dayHour;
    }
}