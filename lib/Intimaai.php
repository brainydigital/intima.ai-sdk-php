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
use Intimaai\Resources\User\UserNotification;
use Intimaai\Resources\User\UserWebhook;

class Intimaai
{
    private $API;

    public $autenticacoesResources;

    public $tribunaisResources;

    public $certificadosResources;

    public $intimacoesResources;

    public $usuariosResources;

    public $notificacoesResources;

    public $webhooksResources;

    public $acoesResources;

    public $copiasProcessuaisResources;

    public $escutasProcessuaisResources;

    public $protocolosDeHabilitacaoResources;

    public $informacoesProcessuaisResources;

    public $andamentosProcessuaisResources;

    public $protocolosProcessuaisResources;

    public $consultasProcessuaisResources;

    /**
     * Intimaai constructor.
     * @param string $apiKey set api_token
     * @param string|null $proxy set a proxy
     * @param int|null $timeout in seconds
     * @param bool $debug enable debug mode
     */
    public function __construct($apiKey, $proxy = null, $timeout = null, $debug = false)
    {
        $this->API = new API($apiKey, $proxy, $timeout, $debug);
        $this->autenticacoesResources = new Auth($this->API);
        $this->tribunaisResources = new Tribunal($this->API);
        $this->certificadosResources = new Certificate($this->API);
        $this->intimacoesResources = new Intimation($this->API);
        $this->usuariosResources = new User($this->API);
        $this->notificacoesResources = new UserNotification($this->API);
        $this->webhooksResources = new UserWebhook($this->API);

        $this->acoesResources = new Action($this->API);
        $this->copiasProcessuaisResources = new ProcessCopy($this->API, $this->acoesResources);
        $this->escutasProcessuaisResources = new ProcessListener($this->API, $this->acoesResources);
        $this->protocolosDeHabilitacaoResources = new ProcessQualificationProtocol($this->API, $this->acoesResources);
        $this->informacoesProcessuaisResources = new ProcessInfo($this->API, $this->acoesResources);
        $this->andamentosProcessuaisResources = new ProcessCourse($this->API, $this->acoesResources);
        $this->protocolosProcessuaisResources = new ProcessProtocol($this->API, $this->acoesResources);
        $this->consultasProcessuaisResources = new ProcessSearch($this->API, $this->acoesResources);
    }

    /**
     * @return API
     */
    public function getAPI()
    {
        return $this->API;
    }
}