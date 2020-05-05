<?php

namespace Intimaai\Resources;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class Tribunal extends Resource
{
    public function getResourceEndpoint()
    {
        return 'tribunals';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Get a tribunal by id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getById($id)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }
}