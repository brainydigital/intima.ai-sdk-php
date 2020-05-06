<?php

namespace Intimaai\Resources\ProcessInfo;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Resources\Action;

class ProcessInfo extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'process-infos';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Get a process information by id
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
     * Get a new process information
     * @param Process $process
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewProcessInfo(Process $process)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $process->getProcessNumber(),
                'auth_id' => $process->getAuthId()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }
}