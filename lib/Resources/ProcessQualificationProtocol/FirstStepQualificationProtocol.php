<?php

namespace Intimaai\Resources\ProcessQualificationProtocol;


class FirstStepQualificationProtocol
{
    private $processNumber;
    private $authId;

    /**
     * FirstStepQualificationProtocol constructor.
     * @param string $processNumber
     * @param int $authId
     */
    public function __construct($processNumber, $authId)
    {
        $this->processNumber = $processNumber;
        $this->authId = $authId;
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
}