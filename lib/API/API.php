<?php


namespace Intimaai\API;


use GuzzleHttp\Client;

abstract class API
{
    private $client;

    protected static $baseUri = 'https://use.intima.ai/api/v2/';

    protected static $proxy = null;

    protected static $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->getBaseUri()
        ]);
    }

    protected function getJson($path, $options = [])
    {
        return json_decode($this->get($path, $options), true);
    }

    protected function get($path, $options = [])
    {
        $options = array_merge([
            'query' => [
                'api_token' => self::$apiKey
            ],
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => 'Intimaai_SDK/2.0.0'
            ],
            'proxy' => self::$proxy
        ], $options);

        return $this
            ->getClient()
            ->get($path, $options)
            ->getBody()
            ->getContents();
    }

    private function getClient()
    {
        return $this->client;
    }

    public static function setBaseUri($baseUri)
    {
        self::$baseUri = $baseUri;
    }

    public static function getBaseUri()
    {
        return self::$baseUri;
    }

    public static function getApiKey()
    {
        return self::$apiKey;
    }

    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    public static function setProxy($url)
    {
        self::$proxy = $url;
    }

    public static function getProxy()
    {
        return self::$proxy;
    }

    protected function parseUrl($url)
    {
        $url = parse_url($this->firstPageLink);

        if(!empty($url['query'])) {
            parse_str($url['query'], $query);

            $url['query'] = $query;
        }

        return $url;
    }

    protected function buildUrl(array $elements) {
        $e = $elements;
        return
            (isset($e['host']) ? (
                (isset($e['scheme']) ? "$e[scheme]://" : '//') .
                (isset($e['user']) ? $e['user'] . (isset($e['pass']) ? ":$e[pass]" : '') . '@' : '') .
                $e['host'] .
                (isset($e['port']) ? ":$e[port]" : '')
            ) : '') .
            (isset($e['path']) ? $e['path'] : '/') .
            (isset($e['query']) ? '?' . (is_array($e['query']) ? http_build_query($e['query'], '', '&') : $e['query']) : '') .
            (isset($e['fragment']) ? "#$e[fragment]" : '')
            ;
    }

}