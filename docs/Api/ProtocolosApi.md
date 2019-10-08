# Swagger\Client\ProtocolosApi

All URIs are relative to *https://198ae2a7.ngrok.io/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createProcessProtocolo**](ProtocolosApi.md#createprocessprotocolo) | **POST** /actions/process-protoco/{pje_auth_id} | Realiza um novo protocolo

# **createProcessProtocolo**
> createProcessProtocolo($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id)

Realiza um novo protocolo

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_token', 'Bearer');

$apiInstance = new Swagger\Client\Api\ProtocolosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$numero_processo = "numero_processo_example"; // string | 
$tipo_documento_mensagem_geral = 56; // int | 
$documentos = array(new \Swagger\Client\Model\Documento()); // \Swagger\Client\Model\Documento[] | 
$pje_auth_id = 56; // int | é o id referente ao tribunal cadastrado em \"Tribunais ativos\" no Intima.ai

try {
    $apiInstance->createProcessProtocolo($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id);
} catch (Exception $e) {
    echo 'Exception when calling ProtocolosApi->createProcessProtocolo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **numero_processo** | **string**|  |
 **tipo_documento_mensagem_geral** | **int**|  |
 **documentos** | [**\Swagger\Client\Model\Documento[]**](../Model/\Swagger\Client\Model\Documento.md)|  |
 **pje_auth_id** | **int**| é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai |

### Return type

void (empty response body)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

