<?php


namespace Intimaai\API;

use Tightenco\Collect\Support\Collection;

class Paginator extends API
{

    protected $currentPage = 0;

    protected $lastPage = 1;

    protected $perPage = 15;

    protected $total = 0;

    protected $paginationData;

    protected $data;

    protected $resourceClass;

    protected $firstPageLink;

    public function __construct($paginationData, $resourceClass)
    {
        $this->paginationData = $paginationData;
        $this->resourceClass = $resourceClass;

        $this->prepare();

        parent::__construct();
    }

    private function prepare()
    {
        $this->currentPage = (int)$this->paginationData['meta']['current_page'];
        $this->lastPage = (int)$this->paginationData['meta']['last_page'];
        $this->perPage = (int)$this->paginationData['meta']['per_page'];
        $this->total = (int)$this->paginationData['meta']['total'];
        $this->firstPageLink = $this->paginationData['links']['first'];

        $this->data = Collection::make($this->paginationData['data'])->map(function ($resource) {
            $resourceClass = $this->resourceClass;

            return new $resourceClass($resource['id'], $resource);
        });
    }

    /**
     * Return a collection of resources
     * @return Collection
     */
    public function getCollection()
    {
        return $this->data;
    }

    private function getResourcesForPage($page)
    {
        $link = $this->parseUrl($this->firstPageLink);
        $link['query']['page'] = $page;

        return $this->getJson($this->buildUrl($link), [
            'query' => $link['query']
        ]);
    }

    /**
     * Get an specific page
     * @param int $page Page number
     * @return Paginator
     */
    public function getPage($page)
    {
        $this->paginationData = $this->getResourcesForPage($page);

        $this->prepare();

        return $this;
    }

    /**
     * Get next page
     * @return Paginator
     */
    public function nextPage()
    {
        if($this->currentPage < $this->lastPage) {
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
            $this->currentPage++;

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
            if($this->lastPage === 1) {
                return $this;
            }

            $this->currentPage = 1;
        }

        $resources = [];
        $latestRequest = null;

        while($this->hasNextPage()) {
            $latestRequest = $this->getResourcesForPage($this->currentPage);

            $resources = array_merge($resources, $latestRequest['data']);
        }

        $this->paginationData = $latestRequest;
        $this->paginationData['data'] = $resources;

        $this->prepare();

        return $this;
    }

}