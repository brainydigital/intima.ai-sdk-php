<?php

namespace Intimaai\Resources;

use Exception;
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
        return 'acoes';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Obtem uma ação pelo id
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
        return $this->getAPI()->request($options);
    }

    /**
     * Obtem os resultados de uma ação pelo id
     * @param int $acaoId
     * @return Paginator
     * @throws Exception
     */
    public function consultarResultadosDaAcao($acaoId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $acaoId);
        return $resource->paginar();
    }

    /**
     * Tenta executar novamente uma ação pelo id
     * @param int $acaoId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function tentarNovamente($acaoId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $acaoId . '/tentar-novamente',
            'method' => API::GET
        ];
        return $this->getAPI()->request($options);
    }
}