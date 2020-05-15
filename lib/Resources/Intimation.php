<?php

namespace Intimaai\Resources;


use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class Intimation extends Resource
{
    public function getResourceEndpoint()
    {
        return 'intimations';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Get a intimation by id
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
     * Mark a intimation as revised
     * @param int $intimationId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function marcarIntimacaoComoRevisada($intimationId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $intimationId . '/mark-as-revised',
            'method' => API::PUT
        ];
        return $this->getAPI()->request($options, true);
    }
}