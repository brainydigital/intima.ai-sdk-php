# Swagger\Client\CopiasApi

All URIs are relative to *https://198ae2a7.ngrok.io/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createProcessCopy**](CopiasApi.md#createprocesscopy) | **POST** /actions/processos/copy/{pje_auth_id} | Realiza uma nova cópia processual

# **createProcessCopy**
> createProcessCopy($processo, $pje_auth_id)

Realiza uma nova cópia processual

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_token', 'Bearer');

$apiInstance = new Swagger\Client\Api\CopiasApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$processo = "processo_example"; // string | 
$pje_auth_id = 56; // int | é o id referente ao tribunal cadastrado em \"Tribunais ativos\" no Intima.ai

try {
    $apiInstance->createProcessCopy($processo, $pje_auth_id);
} catch (Exception $e) {
    echo 'Exception when calling CopiasApi->createProcessCopy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **processo** | **string**|  |
 **pje_auth_id** | **int**| é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai |

### Return type

void (empty response body)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

