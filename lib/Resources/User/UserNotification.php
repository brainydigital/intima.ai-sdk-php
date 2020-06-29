<?php

namespace Intimaai\Resources\User;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class UserNotification extends Resource
{
    function getResourceEndpoint()
    {
        return 'usuarios-notificacoes';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Obtem um email cadastrado para receber notificações pelo id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
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
     * Cadastra um novo email para receber notificações
     * @param string $email
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
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
     * Atualiza um email para receber notificações pelo id
     * @param int $emailNotificaoId
     * @param string $email
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function atualizarEmailParaNotificacoes($emailNotificaoId, $email)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $emailNotificaoId,
            'method' => API::PUT,
            'body' => [
                'email' => $email
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Deleta um email cadastrado pelo id, que deixara de receber notificações
     * @param int $emailNotificaoId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function excluirEmailParaNotificacoes($emailNotificaoId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $emailNotificaoId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}