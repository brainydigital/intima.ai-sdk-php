<?php

namespace Intimaai;

use Intimaai\API\API;
use Intimaai\Resources\Action;
use Intimaai\Resources\Auth\Auth;
use Intimaai\Resources\Certificate\Certificate;
use Intimaai\Resources\ProcessCopy\ProcessCopy;
use Intimaai\Resources\ProcessInfo\ProcessInfo;

class Intimaai
{
    private $API;

    public $authResource;

    public $certificateResource;

    public $actionResource;

    public $copyResource;

    public $processInfoResource;

    /**
     * Intimaai constructor.
     * @param $apiKey
     * @param $proxy
     * @param $timeout
     */
    public function __construct($apiKey, $proxy = null, $timeout = null)
    {
        $this->API = new API($apiKey, $proxy, $timeout);
        $this->authResource = new Auth($this->API);
        $this->certificateResource = new Certificate($this->API);
        $this->actionResource = new Action($this->API);
        $this->copyResource = new ProcessCopy($this->API, $this->actionResource);
        $this->processInfoResource = new ProcessInfo($this->API, $this->actionResource);
    }

    /**
     * @return API
     */
    public function getAPI()
    {
        return $this->API;
    }
}