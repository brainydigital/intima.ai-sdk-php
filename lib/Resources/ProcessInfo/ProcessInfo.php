<?php

namespace Intimaai\Resources\ProcessInfo;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\InformacaoProcessual;
use Intimaai\Resources\Action;

class ProcessInfo extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'informacoes-processuais';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Obtem uma informação processual pelo id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function consultarPorId($id)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Cadastra uma nova informação processual
     * @param InformacaoProcessual $informacaoProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function capturarNovaInformacaoProcessual(InformacaoProcessual $informacaoProcessual)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $informacaoProcessual->getProcessNumber(),
                'auth_id' => $informacaoProcessual->getAuthId()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }
}