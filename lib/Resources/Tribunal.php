<?php

namespace Intimaai\Resources;

use Intimaai\API\API;
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
}