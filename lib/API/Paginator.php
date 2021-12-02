<?php

namespace Intimaai\API;

class Paginator
{
    protected $currentPage = 0;

    protected $lastPage = 1;

    protected $perPage = 15;

    protected $total = 0;

    protected $paginationData;

    protected $data;

    protected $resourceClass;

    protected $firstPageLink;

    public function __construct(Resource $resourceClass)
    {
        $this->resourceClass = $resourceClass;
    }

    private function prepare()
    {
        $this->currentPage = (int)$this->paginationData['meta']['current_page'];
        $this->lastPage = (int)$this->paginationData['meta']['last_page'];
        $this->perPage = (int)$this->paginationData['meta']['per_page'];
        $this->total = (int)$this->paginationData['meta']['total'];
        $this->firstPageLink = $this->paginationData['links']['first'];
        $this->data = $this->paginationData['data'];
    }

    /**
     * Retorna uma coleção com os recursos
     * @return array|mixed
     */
    public function obterColecao()
    {
        return $this->getCollection();
    }

    /**
     * Return a collection of resources
     * @return array|mixed
     */
    private function getCollection()
    {
        return $this->data;
    }

    /**
     * Obtem uma página do recurso
     * @param int $pagina Número da página do recurso
     * @return Paginator
     * @throws APIRequestException
     */
    public function obterPagina($pagina)
    {
        return $this->getPage($pagina);
    }

    /**
     * Get an specific page
     * @param int $page Page number
     * @return Paginator
     * @throws APIRequestException
     */
    private function getPage($page)
    {
        $options = [
            'path' => $this->resourceClass->getResourceEndpoint(),
            'method' => API::GET,
            'options' => [
                'query' => [
                    'page' => $page
                ]
            ]
        ];
        $this->paginationData = $this->resourceClass->getAPI()->request($options);
        $this->prepare();
        return $this;
    }

    /**
     * Obtem os recursos da próxima página
     * @return Paginator
     * @throws APIRequestException
     */
    public function proximaPagina()
    {
        return $this->nextPage();
    }

    /**
     * Get next page
     * @return Paginator
     * @throws APIRequestException
     */
    private function nextPage()
    {
        if(($this->currentPage < $this->lastPage) || (!$this->currentPage && !$this->paginationData)) {
            $this->currentPage++;
            return $this->getPage($this->currentPage);
        }

        return $this;
    }

    /**
     * Obtem os recursos da página anterior
     * @return Paginator
     * @throws APIRequestException
     */
    public function paginaAnterior()
    {
        return $this->previousPage();
    }

    /**
     * Get previous page
     * @return Paginator
     * @throws APIRequestException
     */
    private function previousPage()
    {
        if($this->currentPage > 1) {
            $this->currentPage--;
            return $this->getPage($this->currentPage);
        }

        return $this;
    }

    /**
     * Verifica se a próxima página existe, retorna uma booleana
     * @return bool
     */
    public function existeProximaPagina()
    {
        return $this->hasNextPage();
    }

    private function hasNextPage()
    {
        if($this->currentPage < $this->lastPage) {
            return true;
        }

        return false;
    }

    /**
     * Carrega todos os recursos requisitados
     * Tenha cuidado ao utilizar está função.
     * Sua conta pode ser bloqueada temporariamente, devido ao grande numero de requisições sequenciais.
     * @return Paginator
     * @throws APIRequestException
     */
    public function carregarTudo()
    {
        return $this->loadAll();
    }

    /**
     * Load all requested resources.
     * Be careful with this function.
     * Your account could be blocked because a big number of sequential requests.
     * @return Paginator
     * @throws APIRequestException
     */
    private function loadAll()
    {
        if($this->currentPage === 1 && $this->lastPage === 1) {
            return $this->getPage($this->currentPage);
        }

        $resources = [];

        while($this->hasNextPage()) {
            $this->currentPage++;
            $latestRequest = $this->getPage($this->currentPage);

            $resources = array_merge($resources, $latestRequest->getCollection());
        }

        $this->paginationData['data'] = $resources;

        $this->prepare();

        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getLastPage()
    {
        return $this->lastPage;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }
}