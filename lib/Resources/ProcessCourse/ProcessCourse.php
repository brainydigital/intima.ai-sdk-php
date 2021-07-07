<?php

namespace Intimaai\Resources\ProcessCourse;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Paginator;
use Intimaai\API\Resource;
use Intimaai\Models\AndamentoProcessual;
use Intimaai\Resources\Action;
use Intimaai\Resources\ResourceResult;

class ProcessCourse extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'andamentos-processuais';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Obtem um andamento processual pelo id
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
     * Cadastra um novo andamento processual
     * @param AndamentoProcessual $andamentoProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovoAndamento(AndamentoProcessual $andamentoProcessual)
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'numero_processo' => $andamentoProcessual->getNumeroProcesso(),
                'autenticacao_id' => $andamentoProcessual->getAutenticacaoId(),
            ]
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Captura os andamentos de um andamento processual pré-cadastrado no Intima.ai
     * @param int $andamentoProcessualId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function capturarAndamentos($andamentoProcessualId)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/' . $andamentoProcessualId . '/capturar',
            'method' => API::GET
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Castrada e captura os andamentos de um andamento processual
     * @param AndamentoProcessual $andamentoProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovoAndamentoECapturarAndamentos(AndamentoProcessual $andamentoProcessual)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/criar-e-capturar',
            'method' => API::POST,
            'body' => [
                'numero_processo' => $andamentoProcessual->getNumeroProcesso(),
                'autenticacao_id' => $andamentoProcessual->getAutenticacaoId(),
            ]
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Obtem os resultados da captura do andamento processual pré-cadastrado no Intima.ai
     * @param int $andamentoProcessualId
     * @return Paginator
     * @throws Exception
     */
    public function consultarResultadosDoAndamento($andamentoProcessualId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $andamentoProcessualId);
        return $resource->paginar();
    }

    /**
     * Deleta um andamento processual pelo id
     * @param int $andamentoProcessualId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function excluirAndamento($andamentoProcessualId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $andamentoProcessualId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options);
    }
}