<?php

namespace Intimaai\Resources\User;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class UserWebhook extends Resource
{
    function getResourceEndpoint()
    {
        return 'user-webhooks';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Get a user webhook by id
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
     * Get a new user webhook
     * @param Webhook $userWebhook
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewUserWebhook(Webhook $userWebhook)
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'action_type' => $userWebhook->getActionType(),
                'http_verb' => $userWebhook->getHttpVerb(),
                'url' => $userWebhook->getUrl()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Update a user webhook
     * @param int $userWebhookId
     * @param Webhook $userWebhook
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function updateUserWebhook($userWebhookId, Webhook $userWebhook)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $userWebhookId,
            'method' => API::PUT,
            'body' => [
                'action_type' => $userWebhook->getActionType(),
                'http_verb' => $userWebhook->getHttpVerb(),
                'url' => $userWebhook->getUrl()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Delete a user webhook
     * @param int $userWebhookId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function deleteUserWebhook($userWebhookId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $userWebhookId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}