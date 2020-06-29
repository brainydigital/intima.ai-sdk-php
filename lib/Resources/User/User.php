<?php

namespace Intimaai\Resources\User;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class User extends Resource
{
    function getResourceEndpoint()
    {
        return 'usuarios';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Obtem as informações do usuário autenticado
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function consultarUsuario()
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }
}