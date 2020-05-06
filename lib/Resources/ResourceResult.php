<?php

namespace Intimaai\Resources;

use Intimaai\API\API;
use Intimaai\API\Resource;

class ResourceResult extends Resource
{
    protected $resourcePath;

    function getResourceEndpoint()
    {
        return $this->resourcePath;
    }

    public function __construct(API $api, Resource $resource, $resourceId)
    {
        parent::__construct($api);
        $this->resourcePath = $resource->getResourceEndpoint() . '/' . $resourceId . '/results';
    }
}