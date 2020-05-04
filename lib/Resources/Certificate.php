<?php

namespace Intimaai\Resources;

use Intimaai\API\API;
use Intimaai\API\Resource;

class Certificate extends Resource
{
    public function getResourceEndpoint()
    {
        return 'certificates';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }
}