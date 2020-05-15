<?php

namespace Intimaai\Resources\User;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class UserNotification extends Resource
{
    function getResourceEndpoint()
    {
        return 'user-notifications';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Get a email by id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function consultarPorId($id)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Make a new email for notifications
     * @param string $email
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function cadastrarNovoEmailParaNotificacoes($email)
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'email' => $email
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Update a email for notifications
     * @param int $userEmailNotificationId
     * @param string $email
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function atualizarEmailParaNotificacoes($userEmailNotificationId, $email)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $userEmailNotificationId,
            'method' => API::PUT,
            'body' => [
                'email' => $email
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Delete a email for notifications
     * @param int $userEmailNotificationId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function excluirEmailParaNotificacoes($userEmailNotificationId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $userEmailNotificationId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}