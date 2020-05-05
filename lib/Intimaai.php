<?php

namespace Intimaai;

use Intimaai\API\API;
use Intimaai\Resources\Action;
use Intimaai\Resources\Auth\Auth;
use Intimaai\Resources\Certificate\Certificate;
use Intimaai\Resources\Intimation;
use Intimaai\Resources\ProcessCopy\ProcessCopy;
use Intimaai\Resources\ProcessCourse\ProcessCourse;
use Intimaai\Resources\ProcessInfo\ProcessInfo;
use Intimaai\Resources\ProcessListener\ProcessListener;
use Intimaai\Resources\ProcessProtocol\ProcessProtocol;
use Intimaai\Resources\ProcessQualificationProtocol\ProcessQualificationProtocol;
use Intimaai\Resources\ProcessSearch\ProcessSearch;
use Intimaai\Resources\Tribunal;
use Intimaai\Resources\User\User;
use Intimaai\Resources\User\UserDependent;
use Intimaai\Resources\User\UserWebhook;

class Intimaai
{
    private $API;

    public $authResource;

    public $tribunalResource;

    public $intimationResource;

    public $certificateResource;

    public $userResource;

    public $userDependentResource;

    public $userWebhookResource;

    public $actionResource;

    public $copyResource;

    public $listenerResource;

    public $qualificationProtocolResource;

    public $processInfoResource;

    public $processCourseResource;

    private $processProtocolResource;

    private $processSearchResource;

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
        $this->tribunalResource = new Tribunal($this->API);
        $this->intimationResource = new Intimation($this->API);
        $this->certificateResource = new Certificate($this->API);
        $this->userResource = new User($this->API);
        $this->userDependentResource = new UserDependent($this->API);
        $this->userWebhookResource = new UserWebhook($this->API);

        $this->actionResource = new Action($this->API);
        $this->copyResource = new ProcessCopy($this->API, $this->actionResource);
        $this->listenerResource = new ProcessListener($this->API, $this->actionResource);
        $this->qualificationProtocolResource = new ProcessQualificationProtocol($this->API, $this->actionResource);
        $this->processInfoResource = new ProcessInfo($this->API, $this->actionResource);
        $this->processCourseResource = new ProcessCourse($this->API, $this->actionResource);
        $this->processProtocolResource = new ProcessProtocol($this->API, $this->actionResource);
        $this->processSearchResource = new ProcessSearch($this->API, $this->actionResource);
    }

    /**
     * @return API
     */
    public function getAPI()
    {
        return $this->API;
    }
}