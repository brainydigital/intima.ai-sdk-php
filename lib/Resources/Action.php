<?php

namespace Intimaai\Resources;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Paginator;
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

    /**
     * Get a action by id
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
     * Get action results
     * @param int $actionId
     * @return Paginator
     * @throws \Exception
     */
    public function getActionResults($actionId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $actionId);
        return $resource->paginate();
    }
}