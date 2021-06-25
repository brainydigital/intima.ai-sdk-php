<?php

namespace Intimaai\Resources\ProcessSearch;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Paginator;
use Intimaai\API\Resource;
use Intimaai\Models\ConsultaProcessual;
use Intimaai\Models\PreAnaliseDeConsultaProcessual;
use Intimaai\Resources\Action;
use Intimaai\Resources\ProcessSearchAnalyse;
use Intimaai\Resources\ResourceResult;

class ProcessSearch extends Resource
{
    protected $action;
    protected $searchAnalyse;

    function getResourceEndpoint()
    {
        return 'consultas-processuais';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
        $this->searchAnalyse = new ProcessSearchAnalyse($api, $action, $this);
    }

    /**
     * Obtem uma consulta processual pelo id
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
     * Cadastra uma nova consulta processual
     * @param ConsultaProcessual $consultaProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovaConsulta(ConsultaProcessual $consultaProcessual)
    {
        if (empty($consultaProcessual->getNumeroProcesso()) &&
            empty($consultaProcessual->getNomeParte()) &&
            empty($consultaProcessual->getNomeRepresentante())) {
            throw new Exception('Você precisa fornecer ao menos um parametro para a busca.');
        }

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'numero_processo' => $consultaProcessual->getNumeroProcesso(),
                'autenticacao_id' => $consultaProcessual->getAutenticacaoId(),
                'nome_parte' => $consultaProcessual->getNomeParte(),
                'nome_representante' => $consultaProcessual->getNomeRepresentante(),
                'oab' => [
                    'numero' => $consultaProcessual->getOabNumero(),
                    'letra' => $consultaProcessual->getOabLetra(),
                    'uf' => $consultaProcessual->getOabUf()
                ],
                'token' => $consultaProcessual->getToken()
            ]
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Obtem os resultados das consultas processual pelo id
     * @param int $consultaProcessualId
     * @return Paginator
     */
    public function consultarResultadosDaConsulta($consultaProcessualId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $consultaProcessualId);
        return $resource->paginar();
    }

    /**
     * Obtem um Paginator com as pré-analises de consultas processuais
     * @return Paginator
     */
    public function listarPreAnalisesDeConsultas()
    {
        return $this->searchAnalyse->paginar();
    }

    /**
     * Obtem uma pré-analise de uma consulta processual pelo id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function consultarPorIdPreAnaliseDeConsulta($id)
    {
        $options = [
            'path' => $this->searchAnalyse->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Cadastra uma nova pré-analise para uma consulta processual
     * @param PreAnaliseDeConsultaProcessual $preAnaliseDeConsultaProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarPreAnaliseDeConsulta(PreAnaliseDeConsultaProcessual $preAnaliseDeConsultaProcessual)
    {
        if (empty($preAnaliseDeConsultaProcessual->getNumeroProcesso()) &&
            empty($preAnaliseDeConsultaProcessual->getNomeParte()) &&
            empty($preAnaliseDeConsultaProcessual->getNomeRepresentante())) {
            throw new Exception('Você precisa fornecer ao menos um parametro para a busca.');
        }

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->searchAnalyse->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'numero_processo' => $preAnaliseDeConsultaProcessual->getNumeroProcesso(),
                'autenticacao_id' => $preAnaliseDeConsultaProcessual->getAutenticacaoId(),
                'nome_parte' => $preAnaliseDeConsultaProcessual->getNomeParte(),
                'nome_representante' => $preAnaliseDeConsultaProcessual->getNomeRepresentante(),
                'oab' => [
                    'numero' => $preAnaliseDeConsultaProcessual->getOabNumero(),
                    'letra' => $preAnaliseDeConsultaProcessual->getOabLetra(),
                    'uf' => $preAnaliseDeConsultaProcessual->getOabUf()
                ]
            ]
        ];
        return $this->getAPI()->request($options);
    }
}