<?php

namespace Intimaai\Resources\User;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class User extends Resource
{
    function getResourceEndpoint()
    {
        return 'user';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Get authenticated user
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getUser()
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }
}