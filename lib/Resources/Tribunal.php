<?php

namespace Intimaai\Resources;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class Tribunal extends Resource
{
    public function getResourceEndpoint()
    {
        return 'tribunais';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Obtem um tribunal pelo id
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
}