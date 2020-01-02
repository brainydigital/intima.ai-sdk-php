# Swagger\Client\ProtocolosHabilitacaoGetInfoApi

Todas as URIs são relativas a *https://app.intima.ai/api*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getInfoProcessProtocoloHabilitacao**](ProtocolosHabilitacaoGetInfoApi.md#getInfoProcessProtocoloHabilitacao) | **POST** /actions/process-protocol-habilitacao-get-info/{pje_auth_id} | Captura as informações de um processo para realizar um novo protocolo de habilitação

# **getInfoProcessProtocoloHabilitacao**
> getInfoProcessProtocoloHabilitacao($processo, $pje_auth_id)

Captura as informações de um processo para realizar um novo protocolo de habilitação

### Exemplo
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth (api_token)
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');

$apiInstance = new Swagger\Client\Api\ProtocolosHabilitacaoGetInfoApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$processo = "0000000-00.0000.0.00.0000"; // string | 
$pje_auth_id = 56; // int | é o id referente ao tribunal cadastrado em \"Tribunais ativos\" no Intima.ai

try {
    $apiInstance->getInfoProcessProtocoloHabilitacao($processo, $pje_auth_id);
} catch (Exception $e) {
    echo 'Exception when calling ProtocolosHabilitacaoGetInfoApi->getInfoProcessProtocoloHabilitacao: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
 **processo** | **string**| é o numero do processo no qual se deseja capturar as informações para realizar o protocolo de habilitação | [obrigatório]
 **pje_auth_id** | **int**| é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai | [obrigatório]

### Tipo de retorno

array ['status_code' => 200, 'data' => []]

### Autorização

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Voltar ao topo]](#) [[Voltar a lista da API]](../../README.md#documentation-for-api-endpoints) [[Voltar para a lista de Models]](../../README.md#documentation-for-models) [[Voltar para o README]](../../README.md)

