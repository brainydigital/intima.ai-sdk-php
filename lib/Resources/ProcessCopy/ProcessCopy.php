<?php

namespace Intimaai\Resources\ProcessCopy;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
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

    /**
     * Get a copy by id
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

    /**
     * Get a new copy
     * @param Copy $copy
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewCopy(Copy $copy)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $copy->getProcessNumber(),
                'auth_id' => $copy->getAuthId()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }
}