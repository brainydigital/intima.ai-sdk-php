# Swagger\Client\IntimacoesApi

All URIs are relative to *https://198ae2a7.ngrok.io/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAllIntimacoes**](IntimacoesApi.md#getallintimacoes) | **GET** /intimacoes | Visualiza todas as intimações capturadas

# **getAllIntimacoes**
> getAllIntimacoes()

Visualiza todas as intimações capturadas

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_token', 'Bearer');

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

### Parameters
This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

