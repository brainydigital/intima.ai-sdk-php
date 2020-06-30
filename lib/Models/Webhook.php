<?php

namespace Intimaai\Models;

class Webhook
{
    private $tipoAcao;
    private $verboHttp;
    private $url;

    /**
     * Webhook constructor.
     * @param int $tipoAcao
     * @param string $verboHttp
     * @param string $url
     */
    public function __construct($tipoAcao, $verboHttp, $url)
    {
        $this->tipoAcao = $tipoAcao;
        $this->verboHttp = $verboHttp;
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getTipoAcao()
    {
        return $this->tipoAcao;
    }

    /**
     * @param int $tipoAcao
     */
    public function setTipoAcao($tipoAcao)
    {
        $this->tipoAcao = $tipoAcao;
    }

    /**
     * @return string
     */
    public function getVerboHttp()
    {
        return $this->verboHttp;
    }

    /**
     * @param string $verboHttp
     */
    public function setVerboHttp($verboHttp)
    {
        $this->verboHttp = $verboHttp;
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