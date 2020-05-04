<?php

namespace Intimaai\Resources;

use Intimaai\API\API;
use Intimaai\API\Resource;

class Action extends Resource
{
    function getResourceEndpoint()
    {
        return 'actions';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }
}