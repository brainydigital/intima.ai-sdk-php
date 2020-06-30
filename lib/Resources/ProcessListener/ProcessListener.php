<?php

namespace Intimaai\Resources\ProcessListener;

use Exception;
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
        return 'escutas-processuais';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Obtem uma escuta processual pelo id
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
     * Cadastra uma nova escuta processual
     * @param EscutaProcessual $escutaProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovaEscuta(EscutaProcessual $escutaProcessual)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'numero_processo' => $escutaProcessual->getNumeroProcesso(),
                'autenticacao_id' => $escutaProcessual->getAutenticacaoId(),
                'horarios_de_captura' => $escutaProcessual->getHorariosDeCaptura()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Captura uma escuta processual pelo id
     * @param int $escutaProcessualId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function capturarEscuta($escutaProcessualId)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/' . $escutaProcessualId . '/capturar',
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Cadastra e captura uma escuta processual no Intima.ai
     * @param EscutaProcessual $escutaProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovaEscutaECapturar(EscutaProcessual $escutaProcessual)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/criar-e-capturar',
            'method' => API::POST,
            'body' => [
                'numero_processo' => $escutaProcessual->getNumeroProcesso(),
                'autenticacao_id' => $escutaProcessual->getAutenticacaoId(),
                'horarios_de_captura' => $escutaProcessual->getHorariosDeCaptura()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Obtem os resultados capturados de uma escuta processual
     * @param int $escutaProcessualId
     * @return Paginator
     * @throws Exception
     */
    public function consultarResultadosCapturadosDaEscuta($escutaProcessualId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $escutaProcessualId);
        return $resource->paginar();
    }

    /**
     * Atualiza uma escuta processual pelo id
     * @param int $escutaProcessualId
     * @param AtualizarEscutaProcessual $escutaProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function atualizarEscuta($escutaProcessualId, AtualizarEscutaProcessual $escutaProcessual)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $escutaProcessualId,
            'method' => API::PUT,
            'body' => [
                'horarios_de_captura' => $escutaProcessual->getHorariosDeCaptura()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Deleta uma escuta processual pelo id
     * @param int $escutaProcessualId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function excluirEscuta($escutaProcessualId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $escutaProcessualId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}