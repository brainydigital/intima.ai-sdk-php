<?php

namespace Intimaai\API;


abstract class Resource
{
    private $API;

    private $paginator;

    public function __construct(API $api)
    {
        $this->API = $api;
        $this->paginator = new Paginator($this);
    }

    abstract function getResourceEndpoint();

    /**
     * @return API
     */
    public function getAPI()
    {
        return $this->API;
    }

    /**
     * @return Paginator
     */
    public function paginate()
    {
        return $this->paginator;
    }

}