<?php

namespace Intimaai\Resources\ProcessListener;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Paginator;
use Intimaai\API\Resource;
use Intimaai\Models\AtualizarEscutaProcessual;
use Intimaai\Models\EscutaProcessual;
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
    public function consultarPorId($id)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Make a new listener
     * @param EscutaProcessual $listener
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function cadastrarNovaEscuta(EscutaProcessual $listener)
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
    public function capturarEscuta($listenerId)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/' . $listenerId . '/capture',
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Make a new listener and capture
     * @param EscutaProcessual $listener
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function cadastrarNovaEscutaECapturar(EscutaProcessual $listener)
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
    public function consultarResultadosCapturadosDaEscuta($listenerId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $listenerId);
        return $resource->paginate();
    }

    /**
     * Update a listener
     * @param int $listenerId
     * @param AtualizarEscutaProcessual $listener
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function atualizarEscuta($listenerId, AtualizarEscutaProcessual $listener)
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
    public function excluirEscuta($listenerId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $listenerId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}