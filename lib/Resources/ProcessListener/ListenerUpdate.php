<?php

namespace Intimaai\Resources\ProcessListener;


class ListenerUpdate
{
    private $scheduleTimes;

    /**
     * ListenerUpdate constructor.
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