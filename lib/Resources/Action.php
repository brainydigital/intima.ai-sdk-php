<?php

namespace Intimaai\Resources;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Paginator;
use Intimaai\API\Resource;

class Action extends Resource
{
    const PROCESS_INFO = 0,
        PROCESS_COPY = 1,
        PROCESS_INTIMACOES = 2,
        PROCESS_ESCUTA = 3,
        PROCESS_PROTOCOLO = 4,
        PROCESS_PROTOCOLO_HABILITACAO = 5,
        PROCESS_ANDAMENTOS = 6,
        PROCESS_CONSULTA = 7,
        PROCESS_CONSULTA_PRE_ANALISE = 8;

    function getResourceEndpoint()
    {
        return 'actions';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Get a action by id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
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
     * Get action results
     * @param int $actionId
     * @return Paginator
     * @throws \Exception
     */
    public function consultarResultadosDaAcao($actionId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $actionId);
        return $resource->paginate();
    }
}