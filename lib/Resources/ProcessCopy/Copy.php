<?php

namespace Intimaai\Resources\ProcessCopy;

class Copy
{
    private $processNumber;

    private $authId;

    /**
     * Copy constructor.
     * @param string $processNumber
     * @param int $authId
     */
    public function __construct($processNumber, $authId)
    {
        $this->processNumber = $processNumber;
        $this->authId = $authId;
    }

    /**
     * @return mixed
     */
    public function getProcessNumber()
    {
        return $this->processNumber;
    }

    /**
     * @param mixed $processNumber
     */
    public function setProcessNumber($processNumber)
    {
        $this->processNumber = $processNumber;
    }

    /**
     * @return mixed
     */
    public function getAuthId()
    {
        return $this->authId;
    }

    /**
     * @param mixed $authId
     */
    public function setAuthId($authId)
    {
        $this->authId = $authId;
    }
}