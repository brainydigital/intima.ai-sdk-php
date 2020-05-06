<?php

namespace Intimaai\Resources\User;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class UserDependent extends Resource
{
    function getResourceEndpoint()
    {
        return 'user-dependents';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Get a user dependent by id
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
     * Get a new user dependent
     * @param Dependent $userDependent
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewUserDependent(Dependent $userDependent)
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'email' => $userDependent->getEmail()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Update a user dependent
     * @param int $userDependentId
     * @param Dependent $userDependent
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function updateUserDependent($userDependentId, Dependent $userDependent)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $userDependentId,
            'method' => API::PUT,
            'body' => [
                'email' => $userDependent->getEmail()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Delete a user dependent
     * @param int $userDependentId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function deleteUserDependent($userDependentId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $userDependentId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}