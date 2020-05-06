<?php

namespace Intimaai\Resources\User;


class Webhook
{
    private $actionType;
    private $httpVerb;
    private $url;

    /**
     * Webhook constructor.
     * @param int $actionType
     * @param string $httpVerb
     * @param string $url
     */
    public function __construct($actionType, $httpVerb, $url)
    {
        $this->actionType = $actionType;
        $this->httpVerb = $httpVerb;
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getActionType()
    {
        return $this->actionType;
    }

    /**
     * @param int $actionType
     */
    public function setActionType($actionType)
    {
        $this->actionType = $actionType;
    }

    /**
     * @return string
     */
    public function getHttpVerb()
    {
        return $this->httpVerb;
    }

    /**
     * @param string $httpVerb
     */
    public function setHttpVerb($httpVerb)
    {
        $this->httpVerb = $httpVerb;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}