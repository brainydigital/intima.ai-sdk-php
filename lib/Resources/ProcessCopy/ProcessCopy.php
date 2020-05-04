<?php

namespace Intimaai\Resources\ProcessCopy;

use Intimaai\API\API;
use Intimaai\API\Resource;
use Intimaai\Resources\Action;

class ProcessCopy extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'process-copies';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    public function getById($id)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    public function getNewCopy(Copy $copy)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'options' => [
                'query' => [
                    'process_number' => $copy->getProcessNumber(),
                    'auth_id' => $copy->getAuthId()
                ]
            ]
        ];
        return $this->getAPI()->request($options, true);
    }
}