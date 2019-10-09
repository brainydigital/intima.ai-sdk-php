# Swagger\Client\AcoesApi

Todas as URIs são relativas a *https://app.intima.ai/api*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getActionStatus**](AcoesApi.md#getactionstatus) | **GET** /actions/status/{pje_action_id} | Checa o resultado de uma ação

# **getActionStatus**
> getActionStatus($pje_action_id)

Checa o resultado de uma ação

### Exemplo
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth (api_token)
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');

$apiInstance = new Swagger\Client\Api\AcoesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$pje_action_id = 56; // int | é fornecido após se realizar a requisição de qualquer ação para o Intima.ai

try {
    $apiInstance->getActionStatus($pje_action_id);
} catch (Exception $e) {
    echo 'Exception when calling AcoesApi->getActionStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
 **pje_action_id** | **int**| é fornecido após se realizar a requisição de qualquer ação para o Intima.ai | [obrigatório]

### Tipo de retorno

array ['status_code' => 200, 'data' => []]

### Autorização

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Voltar ao topo]](#) [[Voltar a lista da API]](../../README.md#documentation-for-api-endpoints) [[Voltar para a lista de Models]](../../README.md#documentation-for-models) [[Voltar para o README]](../../README.md)

