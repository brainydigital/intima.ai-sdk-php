# Swagger\Client\ProtocolosApi

Todas as URIs são relativas a *https://app.intima.ai/api*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**createProcessProtocolo**](ProtocolosApi.md#createprocessprotocolo) | **POST** /actions/process-protoco/{pje_auth_id} | Realiza um novo protocolo

# **createProcessProtocolo**
> createProcessProtocolo($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao)

Realiza um novo protocolo

### Exemplo
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');

$apiInstance = new Swagger\Client\Api\ProtocolosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$numero_processo = "0000000-00.0000.0.00.0000"; // string | 
$tipo_documento_mensagem_geral = 56; // int | 
$documentos = array(new \Swagger\Client\Model\Documento([
  'arquivo' => fopen('peticao.pdf', 'r'),
  'tipo_documento' => 11,
  'descricao_documento' => 'Petição',
  'order' => 1
])); // \Swagger\Client\Model\Documento[] | 
$mensagem_geral = "SEGUE EM ANEXO";// string | opcional
$descricao = "";// string | opcional
$pje_auth_id = 56; // int | é o id referente ao tribunal cadastrado em \"Tribunais ativos\" no Intima.ai

try {
    $apiInstance->createProcessProtocolo($numero_processo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao);
} catch (Exception $e) {
    echo 'Exception when calling ProtocolosApi->createProcessProtocolo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
 **numero_processo** | **string**| é o numero do processo no qual se deseja realizar o protocolo | [obrigatório]
 **tipo_documento_mensagem_geral** | **int**| é o id referente ao tipo de documento da mensagem geral | [obrigatório]
 **documentos** | [**Documento[]**](../Model/Documento.md)| são os anexos relacionados ao protocolo | [opcional]
 **pje_auth_id** | **int**| é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai | [obrigatório]
 **mensagem_geral** | **string**| é o texto do conteúdo do protocolo (texto padrão: SEGUE EM ANEXO) | [opcional]
 **descricao** | **string**| é a descrição da mensagem geral (caso não se informe este campo, ele assumira o valor do campo tipo_documento_mensagem_geral) | [opcional]

### Tipo de retorno

array ['status_code' => 200, 'data' => []]

### Autorização

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Voltar ao topo]](#) [[Voltar a lista da API]](../../README.md#documentation-for-api-endpoints) [[Voltar para a lista de Models]](../../README.md#documentation-for-models) [[Voltar para o README]](../../README.md)

