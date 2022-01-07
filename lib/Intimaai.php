<?php

namespace Intimaai;

use Intimaai\API\API;
use Intimaai\Resources\Action;
use Intimaai\Resources\Auth\Auth;
use Intimaai\Resources\Certificate\Certificate;
use Intimaai\Resources\Credit\Credit;
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

    public $autenticacoes;

    public $tribunais;

    public $certificados;

    public $intimacoes;

    public $usuarios;

    public $notificacoes;

    public $webhooks;

    public $creditos;

    public $acoes;

    public $copiasProcessuais;

    public $escutasProcessuais;

    public $protocolosDeHabilitacao;

    public $informacoesProcessuais;

    public $andamentosProcessuais;

    public $protocolosProcessuais;

    public $consultasProcessuais;

    /**
     * Intimaai constructor.
     * @param string $apiKey set api_token
     * @param string|null $proxy set a proxy
     * @param int|null $timeout in seconds
     * @param bool $debug enable debug mode
     * @param array $options others http options
     */
    public function __construct($apiKey, $proxy = null, $timeout = null, $debug = false, $options = [])
    {
        $this->API = new API($apiKey, $proxy, $timeout, $debug, $options);
        $this->autenticacoes = new Auth($this->API);
        $this->tribunais = new Tribunal($this->API);
        $this->certificados = new Certificate($this->API);
        $this->intimacoes = new Intimation($this->API);
        $this->usuarios = new User($this->API);
        $this->notificacoes = new UserNotification($this->API);
        $this->webhooks = new UserWebhook($this->API);
        $this->creditos = new Credit($this->API);

        $this->acoes = new Action($this->API);
        $this->copiasProcessuais = new ProcessCopy($this->API, $this->acoes);
        $this->escutasProcessuais = new ProcessListener($this->API, $this->acoes);
        $this->protocolosDeHabilitacao = new ProcessQualificationProtocol($this->API, $this->acoes);
        $this->informacoesProcessuais = new ProcessInfo($this->API, $this->acoes);
        $this->andamentosProcessuais = new ProcessCourse($this->API, $this->acoes);
        $this->protocolosProcessuais = new ProcessProtocol($this->API, $this->acoes);
        $this->consultasProcessuais = new ProcessSearch($this->API, $this->acoes);
    }

    /**
     * @return API
     */
    public function getAPI()
    {
        return $this->API;
    }
}