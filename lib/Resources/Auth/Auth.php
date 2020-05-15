<?php

namespace Intimaai\Resources\Auth;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\AtivarIntimacoesParaAutenticacao;
use Intimaai\Models\NovaAutenticacao;

class Auth extends Resource
{
    public function getResourceEndpoint()
    {
        return 'auths';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Get a auth by id
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
     * Make a new auth
     * @param NovaAutenticacao $auth
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function cadastrarNovaAutenticacao(NovaAutenticacao $auth)
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $copy->getProcessNumber(),
                'auth_id' => $copy->getAuthId()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Enable intimations capture for a auth
     * @param int $authId
     * @param AtivarIntimacoesParaAutenticacao $enableAuth
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function ativarCapturaDeIntimacoesParaAutenticacao($authId, AtivarIntimacoesParaAutenticacao $enableAuth)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $authId . '/intimations/enable',
            'method' => API::PUT,
            'body' => [
                'tabs' => $enableAuth->getTabs(),
                'week_days' => $enableAuth->getWeekDays(),
                'day_hour' => $enableAuth->getDayHour()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Disable intimations capture for a auth
     * @param int $authId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function desativarCapturaDeIntimacoesParaAutenticacao($authId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $authId . '/intimations/disable',
            'method' => API::PUT
        ];
        return $this->getAPI()->request($options, true);
    }
}