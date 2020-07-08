<?php

namespace Intimaai\Resources\User;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\Webhook;

class UserWebhook extends Resource
{
    function getResourceEndpoint()
    {
        return 'usuarios-webhooks';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Obtem um webhook de usuário cadastrado no Intima.ai pelo id
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
        return $this->getAPI()->request($options);
    }

    /**
     * Cadastra um novo webhook de usuário
     * @param Webhook $webhook
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovoWebhook(Webhook $webhook)
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'tipo_acao' => $webhook->getTipoAcao(),
                'verbo_http' => $webhook->getVerboHttp(),
                'url' => $webhook->getUrl()
            ]
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Atualiza um webhook de usuário pelo id
     * @param int $webhookId
     * @param Webhook $webhook
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function atualizarWebhook($webhookId, Webhook $webhook)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $webhookId,
            'method' => API::PUT,
            'body' => [
                'tipo_acao' => $webhook->getTipoAcao(),
                'verbo_http' => $webhook->getVerboHttp(),
                'url' => $webhook->getUrl()
            ]
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Deleta um webhook de usuário pelo id
     * @param int $webhookId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function excluirWebhook($webhookId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $webhookId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options);
    }
}