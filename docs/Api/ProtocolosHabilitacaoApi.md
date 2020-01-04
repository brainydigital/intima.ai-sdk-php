# Swagger\Client\ProtocolosHabilitacaoApi

Todas as URIs são relativas a *https://app.intima.ai/api*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**createProcessProtocoloHabilitacao**](ProtocolosHabilitacaoApi.md#createProcessProtocoloHabilitacao) | **POST** /actions/process-protocol-habilitacao/{protocolo_habilitacao_id} | Realiza um novo protocolo de habilitação

# **createProcessProtocoloHabilitacao**
> createProcessProtocoloHabilitacao($numero_processo, $tipo_solicitacao, $tipo_declaracao, $polo, $partes_vinculadas, $tipo_documento_mensagem_geral, $documentos, $protocolo_habilitacao_id, $mensagem_geral, $descricao)

Realiza um novo protocolo de habilitação

### Exemplo
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth (api_token)
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');

$apiInstance = new Swagger\Client\Api\ProtocolosHabilitacaoApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$numero_processo = "0000000-00.0000.0.00.0000"; // string | obrigatório
$tipo_documento_mensagem_geral = 0; // int | obrigatório
$documentos = array(
    new \Swagger\Client\Model\Documento([
        'arquivo' => fopen('habilitacao_1.pdf', 'r'),
        'tipo_documento' => 31,
        'descricao_documento' => 'habilitacao_1',
        'order' => 1
    ])
); // \Swagger\Client\Model\Documento[] | opcional
$mensagem_geral = "SEGUE EM ANEXO";// string | opcional
$descricao = "Protocolo de habilitação";// string | opcional
$protocolo_habilitacao_id = 3; // int | é o id referente ao protocolo de habilitação no Intima.ai

$tipo_solicitacao = 0; // int | é o id referente ao tipo de solicitação no Intima.ai
$tipo_declaracao = 0; // int | é o id referente ao tipo de declaração no Intima.ai
$polo = 1; // int | é o id referente ao polo no Intima.ai
$partes_vinculadas = [
    'BANCO BRADESCO S/A - CNPJ: 60.746.948/0001-12 (DEMANDADO)'
]; // int | são as partes vinculadas, de com o polo selecionado no Intima.ai

try {
    $apiInstance->createProcessProtocoloHabilitacao($numero_processo, $tipo_solicitacao, $tipo_declaracao, $polo, $partes_vinculadas, $tipo_documento_mensagem_geral, $documentos, $protocolo_habilitacao_id, $mensagem_geral, $descricao);
} catch (Exception $e) {
    echo 'Exception when calling ProtocolosHabilitacaoApi->createProcessProtocoloHabilitacao: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
 **numero_processo** | **string**| é o numero do processo no qual se deseja realizar o protocolo de habilitação | [obrigatório]
 **protocolo_habilitacao_id** | **int**| é o id referente ao protocolo de habilitação no Intima.ai | [obrigatório]
 **tipo_documento_mensagem_geral** | **int**| é o id referente ao tipo de documento da mensagem geral | [obrigatório]
 **documentos** | [**Documento[]**](../Model/Documento.md)| são os anexos relacionados ao protocolo | [opcional]
 **tipo_solicitacao** | **int**| é o id referente ao tipo de solicitação no Intima.ai | [obrigatório]
 **tipo_declaracao** | **int**| é o id referente ao tipo de declaração no Intima.ai | [obrigatório]
 **polo** | **int**| é o id referente ao polo no Intima.ai | [obrigatório]
 **partes_vinculadas** | **array**| são as partes vinculadas, de com o polo selecionado no Intima.ai | [obrigatório]
 **mensagem_geral** | **string**| é o texto do conteúdo do protocolo (texto padrão: SEGUE EM ANEXO) | [opcional]
 **descricao** | **string**| é a descrição da mensagem geral (caso não se informe este campo, ele assumira o valor do campo tipo_documento_mensagem_geral) | [opcional]

### Tipo de retorno

array ['status_code' => 200, 'data' => []]

### Autorização

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Voltar ao topo]](#) [[Voltar a lista da API]](../../README.md#documentation-for-api-endpoints) [[Voltar para a lista de Models]](../../README.md#documentation-for-models) [[Voltar para o README]](../../README.md)

