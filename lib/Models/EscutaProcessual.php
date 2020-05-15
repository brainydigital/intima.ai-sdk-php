<?php

namespace Intimaai\Models;

class EscutaProcessual
{
    private $processNumber;
    private $authId;
    private $scheduleTimes;

    /**
     * EscutaProcessual constructor.
     * @param string $processNumber
     * @param int $authId
     * @param array $scheduleTimes
     */
    public function __construct($processNumber, $authId, $scheduleTimes)
    {
        $this->processNumber = $processNumber;
        $this->authId = $authId;
        $this->scheduleTimes = $scheduleTimes;
    }

    /**
     * @return string
     */
    public function getProcessNumber()
    {
        return $this->processNumber;
    }

    /**
     * @param string $processNumber
     */
    public function setProcessNumber($processNumber)
    {
        $this->processNumber = $processNumber;
    }

    /**
     * @return int
     */
    public function getAuthId()
    {
        return $this->authId;
    }

    /**
     * @param int $authId
     */
    public function setAuthId($authId)
    {
        $this->authId = $authId;
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