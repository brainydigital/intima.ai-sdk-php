<?php

namespace Intimaai\Resources\Credit;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

class Credit extends Resource
{
    function getResourceEndpoint()
    {
        return 'creditos';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Consulta a cotação atual dos créditos para cada tipo de ação.
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function consultarCotacaoDeCreditosDasAcoes()
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . 'cotacao-acoes',
            'method' => API::GET
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Consulta seu saldo atual em créditos.
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function consultarSaldoEmCreditos()
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . 'saldo',
            'method' => API::GET
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Consulta o histórico de uso de dos seus créditos.
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function consultarHistoricoDeUsoDeCreditos()
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . 'historico-de-uso',
            'method' => API::GET
        ];
        return $this->getAPI()->request($options);
    }
}