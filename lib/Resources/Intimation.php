<?php

namespace Intimaai\Resources;


use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class Intimation extends Resource
{
    public function getResourceEndpoint()
    {
        return 'intimacoes';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Obtem uma intimação pelo id
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
     * Marca uma intimação como revisada
     * @param int $intimacaoId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function marcarIntimacaoComoRevisada($intimacaoId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $intimacaoId . '/marcar-como-revisada',
            'method' => API::PUT
        ];
        return $this->getAPI()->request($options, true);
    }
}