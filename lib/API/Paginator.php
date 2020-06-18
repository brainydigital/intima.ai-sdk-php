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
     * Return a collection of resources
     * @return array|mixed
     */
    public function getCollection()
    {
        return $this->data;
    }

    /**
     * Get an specific page
     * @param int $page Page number
     * @return Paginator
     */
    public function getPage($page)
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
     * Get next page
     * @return Paginator
     */
    public function nextPage()
    {
        if(($this->currentPage < $this->lastPage) || (!$this->currentPage && !$this->paginationData)) {
            $this->currentPage++;
            return $this->getPage($this->currentPage);
        }

        return $this;
    }

    /**
     * Get previous page
     * @return Paginator
     */
    public function previousPage()
    {
        if($this->currentPage > 1) {
            $this->currentPage--;
            return $this->getPage($this->currentPage);
        }

        return $this;
    }

    public function hasNextPage()
    {
        if($this->currentPage < $this->lastPage) {
            return true;
        }

        return false;
    }

    /**
     * Load all requested resources.
     * Be careful with this function.
     * Your account could be blocked because a big number of sequential requests.
     * @return Paginator
     */
    public function loadAll()
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

}