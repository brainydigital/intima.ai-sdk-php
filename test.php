<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth (api_token)
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', '');

//$apiInstance = new Swagger\Client\Api\ProtocolosHabilitacaoGetInfoApi(
//// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
//// This is optional, `GuzzleHttp\Client` will be used as default.
//    new GuzzleHttp\Client(),
//    $config
//);
//
//$numero_processo = ""; // string |
//$pje_action_id = 7; // int | é fornecido após se realizar a requisição de qualquer ação para o Intima.ai
//
//try {
//    $result = $apiInstance->getInfoProcessProtocoloHabilitacao($numero_processo, $pje_action_id);
//    var_dump($result);
//} catch (Exception $e) {
//    echo 'Exception when calling ProtocolosHabilitacaoGetInfoApi->getInfoProcessProtocoloHabilitacao: ', $e->getMessage(), PHP_EOL;
//}

$apiInstance = new Swagger\Client\Api\ProtocolosHabilitacaoApi(
// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
// This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$protocoloHabilitacao = new \Swagger\Client\Model\ProtocoloHabilitacao();

//$documentos = array(
//    new \Swagger\Client\Model\Documento([
//        'arquivo' => fopen('/Users/Downloads/peticao.pdf', 'r'),
//        'tipo_documento' => 28,
//        'descricao_documento' => 'peticao',
//        'order' => 1
//    ])
//);

$documento_1 = new \Swagger\Client\Model\Documento();
$documento_1
    ->setArquivo(fopen('/Users/Downloads/peticao.pdf', 'r'))
    ->setTipoDocumento(6)
    ->setDescricaoDocumento('peticao')
    ->setOrder(1);

$documentos = array($documento_1);

$protocoloHabilitacao
    ->setNumeroProcesso('')
    ->setTipoDocumentoMensagemGeral(0)
    ->setMensagemGeral('SEGUE EM ANEXO')
    ->setDescricao('Petição')
    ->setTipoSolicitacao($protocoloHabilitacao::TIPO_SOLICITACAO_SIMPLES)
    ->setTipoDeclaracao($protocoloHabilitacao::TIPO_DECLARACAO_SOB_PENA_DE_LEI)
    ->setPolo($protocoloHabilitacao::POLO_PASSIVO)
    ->setPartesVinculadas([
        ''
    ])
    ->setDocumentos($documentos);

$protocolo_habilitacao_id = 22;

try {
    $result = $apiInstance->createProcessProtocoloHabilitacao($protocoloHabilitacao, $protocolo_habilitacao_id);
    var_dump($result);
} catch (Exception $e) {
    echo 'Exception when calling ProtocolosHabilitacaoApi->createProcessProtocoloHabilitacao: ', $e->getMessage(), PHP_EOL;
}

//$apiInstance = new Swagger\Client\Api\ProtocolosApi(
//// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
//// This is optional, `GuzzleHttp\Client` will be used as default.
//    new GuzzleHttp\Client(),
//    $config
//);

//$documentos = array(
//    new \Swagger\Client\Model\Documento([
//        'arquivo' => fopen('/Users/raunyhenrique/Downloads/', 'r'),
//        'tipo_documento' => 31,
//        'descricao_documento' => 'habilitacao',
//        'order' => 1
//    ])
//);

$documento_1 = new \Swagger\Client\Model\Documento();
$documento_1
    ->setArquivo(fopen('', 'r'))
    ->setTipoDocumento(28)
    ->setDescricaoDocumento('peticao')
    ->setOrder(1);

$documentos = array($documento_1);

$protocolo = new \Swagger\Client\Model\Protocolo();

$peticao = new \Swagger\Client\Model\Peticao();
$peticao
    ->setArquivo(fopen('/Users/Downloads/peticao_1.pdf', 'r'))
    ->setTipoDocumento(1)
    ->setDescricaoDocumento('peticao_1');

$protocolo
    ->setNumeroProcesso('')
    ->setTipoDocumentoMensagemGeral(2)
    ->setMensagemGeral('SEGUE EM ANEXO')
    ->setDescricao('Apelação')
//    ->setPeticao($peticao)
    ->setDocumentos($documentos);

$pje_auth_id = 1;
//
//try {
//    $result = $apiInstance->createProcessProtocolo($protocolo, $pje_auth_id);
//    var_dump($result);
//} catch (Exception $e) {
//    echo 'Exception when calling ProtocolosApi->createProcessProtocolo: ', $e->getMessage(), PHP_EOL;
//}