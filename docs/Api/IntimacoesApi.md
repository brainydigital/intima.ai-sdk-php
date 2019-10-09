# Swagger\Client\IntimacoesApi

Todas as URIs são relativas a *https://app.intima.ai/api*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getAllIntimacoes**](IntimacoesApi.md#getallintimacoes) | **GET** /intimacoes | Visualiza todas as intimações capturadas

# **getAllIntimacoes**
> getAllIntimacoes()

Visualiza todas as intimações capturadas

### Exemplo
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');

$apiInstance = new Swagger\Client\Api\IntimacoesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->getAllIntimacoes();
} catch (Exception $e) {
    echo 'Exception when calling IntimacoesApi->getAllIntimacoes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parametros
Esse endpoint não tem parametros.

### Tipo de retorno

array ['status_code' => 200, 'data' => []]

### Autorização

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Voltar ao topo]](#) [[Voltar a lista da API]](../../README.md#documentation-for-api-endpoints) [[Voltar para a lista de Models]](../../README.md#documentation-for-models) [[Voltar para o README]](../../README.md)

