<?php


namespace Intimaai\Actions;


class ProcessCopy extends Action
{

    protected $processNumber;

    protected $authId;

    protected $actionName = 'copy';

    public function __construct($processNumber, $authId)
    {
        $this->processNumber = $processNumber;
        $this->authId = $authId;

        parent::__construct();
    }

    public function start()
    {
        $this->get($this->actionName);
    }
}