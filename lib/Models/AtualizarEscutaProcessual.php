<?php

namespace Intimaai\Models;

class AtualizarEscutaProcessual
{
    private $scheduleTimes;

    /**
     * AtualizarEscutaProcessual constructor.
     * @param array $scheduleTimes
     */
    public function __construct($scheduleTimes)
    {
        $this->scheduleTimes = $scheduleTimes;
    }

    /**
     * @return array
     */
    public function getScheduleTimes()
    {
        return $this->scheduleTimes;
    }

    /**
     * @param array $scheduleTimes
     */
    public function setScheduleTimes($scheduleTimes)
    {
        $this->scheduleTimes = $scheduleTimes;
    }
}