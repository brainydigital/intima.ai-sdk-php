<?php

namespace Intimaai\Resources;

use Intimaai\API\API;
use Intimaai\API\Resource;

class Auth extends Resource
{
    public function getResourceEndpoint()
    {
        return 'auths';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }
}