<?php

namespace Intimaai\Resources;

use Intimaai\API\API;
use Intimaai\API\Resource;
use Intimaai\Resources\ProcessSearch\ProcessSearch;

class ProcessSearchAnalyse extends Resource
{
    protected $action;

    private $resourcePath = 'search-analyses';

    function getResourceEndpoint()
    {
        return $this->resourcePath;
    }

    public function __construct(API $api, Action $action, ProcessSearch $processSearch = null)
    {
        parent::__construct($api);
        $this->action = $action;
        if ($processSearch)
        {
            $this->resourcePath = $processSearch->getResourceEndpoint() . '/' . $this->resourcePath;
        }
    }
}