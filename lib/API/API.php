<?php

namespace Intimaai\API;

use GuzzleHttp\Client;

class API
{
    private $client;

    protected static $baseUri = 'http://ea51a18b.ngrok.io/api/v2';

    protected static $apiKey;

    protected static $proxy = null;

    protected static $timeout = null;

    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    public function __construct($apiKey, $proxy = null, $timeout = null)
    {
        $this->client = new Client([
            'base_uri' => $this->getBaseUri()
        ]);

        self::$apiKey = $apiKey;
        self::$proxy = $proxy;
        self::$timeout = $timeout;
    }

    /**
     * Make a API request
     * @param array $requestOptions Options
     * @param bool $getDataOnly Get "data" param only
     * @return mixed
     * @throws \Exception
     */
    public function request($requestOptions, $getDataOnly = false)
    {
        $data = [];

        $path = (array_key_exists('path', $requestOptions)) ? $requestOptions['path'] : null;

        if (empty($path))
        {
            throw new \Exception('A URL informada é inválida!');
        }

        $body = (array_key_exists('body', $requestOptions)) ? $requestOptions['body'] : null;

        $method = (array_key_exists('method', $requestOptions)) ? $requestOptions['method'] : null;

        $options = (array_key_exists('options', $requestOptions)) ? $requestOptions['options'] : null;

        switch ($method)
        {
            case self::GET:
                $data = json_decode($this->get($path, $options), true);
                break;
            case self::POST:
                $data = json_decode($this->post($path, $body, $options), true);
                break;
            case self::PUT:
                $data = json_decode($this->put($path, $body, $options), true);
                break;
            case self::DELETE:
                $data = json_decode($this->delete($path, $options), true);
                break;
            default:
                throw new \Exception('Método HTTP inválido!');
        }

        return ($getDataOnly && array_key_exists('data', $data)) ? $data['data'] : $data;
    }

    private function getRequestDefaultOptions()
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => 'Intimaai_SDK/2.0.0'
            ],
            'proxy' => self::$proxy,
            'timeout' => self::$timeout
        ];
    }

    protected function get($path, $options = [])
    {
        $options = array_merge($this->getRequestDefaultOptions(), $options);

        return $this
            ->getClient()
            ->get('/' . $path . '?api_token=' . self::$apiKey, $options)
            ->getBody()
            ->getContents();
    }

    protected function post($path, $body, $options = [])
    {
        $options = array_merge(
            $this->getRequestDefaultOptions(),
            [
                'json' => $body
            ],
            $options
        );

        return $this
            ->getClient()
            ->post('/' . $path . '?api_token=' . self::$apiKey, $options)
            ->getBody()
            ->getContents();
    }

    protected function put($path, $body, $options = [])
    {
        $options = array_merge(
            $this->getRequestDefaultOptions(),
            [
                'json' => $body
            ],
            $options
        );

        return $this
            ->getClient()
            ->put('/' . $path . '?api_token=' . self::$apiKey, $options)
            ->getBody()
            ->getContents();
    }

    protected function delete($path, $options = [])
    {
        $options = array_merge(
            $this->getRequestDefaultOptions(),
            $options
        );

        return $this
            ->getClient()
            ->delete('/' . $path . '?api_token=' . self::$apiKey, $options)
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

    public static function getTimeout()
    {
        return self::$timeout;
    }

    public static function setTimeout($timeout)
    {
        self::$timeout = $timeout;
    }

}