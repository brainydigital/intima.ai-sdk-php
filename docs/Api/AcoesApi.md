# Swagger\Client\AcoesApi

All URIs are relative to *https://198ae2a7.ngrok.io/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getActionStatus**](AcoesApi.md#getactionstatus) | **GET** /actions/status/{pje_action_id} | Checa o resultado de uma ação

# **getActionStatus**
> getActionStatus($pje_action_id)

Checa o resultado de uma ação

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_token', 'Bearer');

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

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pje_action_id** | **int**| é fornecido após se realizar a requisição de qualquer ação para o Intima.ai |

### Return type

void (empty response body)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

