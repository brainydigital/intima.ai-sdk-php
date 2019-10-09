<?php
/**
 * ProtocolosApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Intima.ai - API
 *
 * Bem vindo a documentação da API do [Intima.ai](https://app.intima.ai). Está documentação cobre todas as ações disponíveis dentro do Intima.ai e as disponibilizam como `ENDPOINTS` que podem ser integrados e utilizados por outros serviços ou aplicações, bastando somente possuir o `Token de acesso da API`.
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.11
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * ProtocolosApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProtocolosApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation createProcessProtocolo
     *
     * Realiza um novo protocolo
     *
     * @param  string $numero_processo numero_processo (required)
     * @param  int $tipo_documento_mensagem_geral tipo_documento_mensagem_geral (required)
     * @param  \Swagger\Client\Model\Documento[] $documentos documentos (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array
     */
    public function createProcessProtocolo($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral = null, $descricao = null)
    {
        return $this->createProcessProtocoloWithHttpInfo($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao);
    }

    /**
     * Operation createProcessProtocoloWithHttpInfo
     *
     * Realiza um novo protocolo
     *
     * @param  string $numero_processo (required)
     * @param  int $tipo_documento_mensagem_geral (required)
     * @param  \Swagger\Client\Model\Documento[] $documentos (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function createProcessProtocoloWithHttpInfo($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao)
    {
        $returnType = '';
        $request = $this->createProcessProtocoloRequest($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return ['status_code' => $statusCode, 'data' => $response->getBody()->getContents()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation createProcessProtocoloAsync
     *
     * Realiza um novo protocolo
     *
     * @param  string $numero_processo (required)
     * @param  int $tipo_documento_mensagem_geral (required)
     * @param  \Swagger\Client\Model\Documento[] $documentos (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createProcessProtocoloAsync($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao)
    {
        return $this->createProcessProtocoloAsyncWithHttpInfo($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao)
            ->then(
                function ($response) {
                    return $response;
                }
            );
    }

    /**
     * Operation createProcessProtocoloAsyncWithHttpInfo
     *
     * Realiza um novo protocolo
     *
     * @param  string $numero_processo (required)
     * @param  int $tipo_documento_mensagem_geral (required)
     * @param  \Swagger\Client\Model\Documento[] $documentos (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createProcessProtocoloAsyncWithHttpInfo($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao)
    {
        $returnType = '';
        $request = $this->createProcessProtocoloRequest($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return ['status_code' => $response->getStatusCode(), 'data' => $response->getBody()->getContents()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createProcessProtocolo'
     *
     * @param  string $numero_processo (required)
     * @param  int $tipo_documento_mensagem_geral (required)
     * @param  \Swagger\Client\Model\Documento[] $documentos (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createProcessProtocoloRequest($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao)
    {
        // verify the required parameter 'numero_processo' is set
        if ($numero_processo === null || (is_array($numero_processo) && count($numero_processo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $numero_processo when calling createProcessProtocolo'
            );
        }
        // verify the required parameter 'tipo_documento_mensagem_geral' is set
        if ($tipo_documento_mensagem_geral === null || (is_array($tipo_documento_mensagem_geral) && count($tipo_documento_mensagem_geral) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $tipo_documento_mensagem_geral when calling createProcessProtocolo'
            );
        }
        // verify the required parameter 'pje_auth_id' is set
        if ($pje_auth_id === null || (is_array($pje_auth_id) && count($pje_auth_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pje_auth_id when calling createProcessProtocolo'
            );
        }

        $resourcePath = '/actions/process-protocol/{pje_auth_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = true;


        // path params
        if ($pje_auth_id !== null) {
            $resourcePath = str_replace(
                '{' . 'pje_auth_id' . '}',
                ObjectSerializer::toPathValue($pje_auth_id),
                $resourcePath
            );
        }

        // form params
        if ($numero_processo !== null) {
            $formParams['numero_processo'] = ObjectSerializer::toFormValue($numero_processo);
        }
        // form params
        if ($tipo_documento_mensagem_geral !== null) {
            $formParams['tipo_documento_mensagem_geral'] = ObjectSerializer::toFormValue($tipo_documento_mensagem_geral);
        }
        // form params
        if ($documentos !== null) {
            $formParams['documentos'] = ObjectSerializer::toFormValue($documentos);
        }
        // form params
        if ($mensagem_geral !== null) {
            $formParams['mensagem_geral'] = ObjectSerializer::toFormValue($mensagem_geral);
        }
        // form params
        if ($descricao !== null) {
            $formParams['descricao'] = ObjectSerializer::toFormValue($descricao);
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    if (!is_array($formParamValue))
                    {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValue
                        ];
                    }
                    else
                    {
                        $multipartContents = array_merge($multipartContents, $this->serializeObjectRequest($formParamValue));
                    }
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('api_token');
        if ($apiKey !== null) {
            $queryParams['api_token'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    protected function serializeObjectRequest($formParam)
    {
        $index = 0;
        $multipartContents = [];
        foreach ($formParam as $doc) {

            if (($doc['arquivo'] === null || empty($doc['arquivo'])) ||
                ($doc['tipo_documento'] === null || empty($doc['tipo_documento'])) ||
                ($doc['descricao_documento'] === null || empty($doc['descricao_documento'])) ||
                ($doc['order'] === null || empty($doc['order']))) {
                throw new \InvalidArgumentException(
                    'Missing the required parameter $documentos when calling createProcessProtocolo'
                );
            }

            $multipartContents[] = [
                'name' => "documentos[arquivos][$index]",
                'contents' => $doc['arquivo']
            ];

            $multipartContents[] = [
                'name' => "documentos[documentos_info][$index][tipo_documento]",
                'contents' => $doc['tipo_documento']
            ];
            $multipartContents[] = [
                'name' => "documentos[documentos_info][$index][descricao_documento]",
                'contents' => $doc['descricao_documento']
            ];
            $multipartContents[] = [
                'name' => "documentos[documentos_info][$index][order]",
                'contents' => $doc['order']
            ];

            $index++;
        }

        return $multipartContents;
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
