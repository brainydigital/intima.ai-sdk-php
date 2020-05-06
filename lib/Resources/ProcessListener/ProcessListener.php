<?php

namespace Intimaai\Resources\ProcessListener;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Paginator;
use Intimaai\API\Resource;
use Intimaai\Resources\Action;
use Intimaai\Resources\ResourceResult;

class ProcessListener extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'process-listeners';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Get a listener by id
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
     * Get a new listener
     * @param Listener $listener
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewCopy(Listener $listener)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $listener->getProcessNumber(),
                'auth_id' => $listener->getAuthId(),
                'schedule_times' => $listener->getScheduleTimes()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Capture listener by id
     * @param int $listenerId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function captureListener($listenerId)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/' . $listenerId . '/capture',
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Get a new listener and capture
     * @param Listener $listener
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewListenerAndCapture(Listener $listener)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/create-and-capture',
            'method' => API::POST,
            'body' => [
                'process_number' => $listener->getProcessNumber(),
                'auth_id' => $listener->getAuthId(),
                'schedule_times' => $listener->getScheduleTimes()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Get a listener capture results
     * @param int $listenerId
     * @return Paginator
     * @throws \Exception
     */
    public function getListenerResults($listenerId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $listenerId);
        return $resource->paginate();
    }

    /**
     * Update a listener
     * @param int $listenerId
     * @param ListenerUpdate $listener
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function updateListener($listenerId, ListenerUpdate $listener)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $listenerId,
            'method' => API::PUT,
            'body' => [
                'schedule_times' => $listener->getScheduleTimes()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Delete a listener
     * @param int $listenerId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function deleteListener($listenerId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $listenerId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}