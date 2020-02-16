# Swagger\Client\ProtocolosHabilitacaoApi

Todas as URIs são relativas a *https://app.intima.ai/api*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**createProcessProtocoloHabilitacao**](ProtocolosHabilitacaoApi.md#createProcessProtocoloHabilitacao) | **POST** /actions/process-protocol-habilitacao/{protocolo_habilitacao_id} | Realiza um novo protocolo de habilitação

# **createProcessProtocoloHabilitacao**
> createProcessProtocoloHabilitacao($protocoloHabilitacao, $protocolo_habilitacao_id)

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

$documento_1 = new \Swagger\Client\Model\Documento();
$documento_1
    ->setArquivo(fopen('habilitacao_1.pdf', 'r'))
    ->setTipoDocumento(6)
    ->setDescricaoDocumento('habilitacao_1')
    ->setOrder(1);

$documentos = array($documento_1);

$protocoloHabilitacao = new \Swagger\Client\Model\ProtocoloHabilitacao();

$protocoloHabilitacao
    ->setTipoDocumentoMensagemGeral(0)
    ->setMensagemGeral('SEGUE EM ANEXO')
    ->setDescricao('Protocolo de habilitação')
    ->setTipoSolicitacao($protocoloHabilitacao::TIPO_SOLICITACAO_SIMPLES)
    ->setTipoDeclaracao($protocoloHabilitacao::TIPO_DECLARACAO_SOB_PENA_DE_LEI)
    ->setPolo($protocoloHabilitacao::POLO_PASSIVO)
    ->setPartesVinculadas([
        'BANCO FULANO - CNPJ: 00.000.000/0000-00 (RECLAMADO)'
    ])
    ->setDocumentos($documentos);

$protocolo_habilitacao_id = 22;

try {
    $apiInstance->createProcessProtocoloHabilitacao($protocoloHabilitacao, $protocolo_habilitacao_id);
} catch (Exception $e) {
    echo 'Exception when calling ProtocolosHabilitacaoApi->createProcessProtocoloHabilitacao: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
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

