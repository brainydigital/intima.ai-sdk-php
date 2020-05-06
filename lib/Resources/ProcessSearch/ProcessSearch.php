<?php

namespace Intimaai\Resources\ProcessSearch;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Paginator;
use Intimaai\API\Resource;
use Intimaai\Resources\Action;
use Intimaai\Resources\ProcessInfo\Process;
use Intimaai\Resources\ProcessInfo\ProcessSearchAnalyse;
use Intimaai\Resources\ResourceResult;

class ProcessSearch extends Resource
{
    protected $action;
    protected $searchAnalyse;

    function getResourceEndpoint()
    {
        return 'process-searchs';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
        $this->searchAnalyse = new ProcessSearchAnalyse($api, $action, $this);
    }

    /**
     * Get a process search by id
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
     * Get a new process search
     * @param Search $search
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewSearch(Search $search)
    {
        if (empty($search->getProcessNumber()) && empty($search->getNomeParte()) && empty($search->getNomeRepresentante())) {
            throw new \Exception('Você precisa fornecer ao menos um parametro para a busca.');
        }

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $search->getProcessNumber(),
                'auth_id' => $search->getAuthId(),
                'nome_parte' => $search->getNomeParte(),
                'nome_representante' => $search->getNomeRepresentante(),
                'token' => $search->getToken()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Get process search results
     * @param int $searchId
     * @return Paginator
     */
    public function getSearchResults($searchId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $searchId);
        return $resource->paginate();
    }

    /**
     * Get processes searchs analyses
     * @return Paginator
     */
    public function getSearchAnalyses()
    {
        return $this->searchAnalyse->paginate();
    }

    /**
     * Get a process search analyse by id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getSearchAnalysesById($id)
    {
        $options = [
            'path' => $this->searchAnalyse->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Get a new process search analyse
     * @param SearchAnalyse $searchAnalyse
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewSearchAnalyses(SearchAnalyse $searchAnalyse)
    {
        if (empty($searchAnalyse->getProcessNumber()) && empty($searchAnalyse->getNomeParte()) && empty($searchAnalyse->getNomeRepresentante())) {
            throw new \Exception('Você precisa fornecer ao menos um parametro para a busca.');
        }

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->searchAnalyse->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $searchAnalyse->getProcessNumber(),
                'auth_id' => $searchAnalyse->getAuthId(),
                'nome_parte' => $searchAnalyse->getNomeParte(),
                'nome_representante' => $searchAnalyse->getNomeRepresentante(),
                'token' => $searchAnalyse->getToken()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }
}