<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth (api_token)
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', '5debc4f0ba5b2');

//$apiInstance = new Swagger\Client\Api\ProtocolosHabilitacaoGetInfoApi(
//// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
//// This is optional, `GuzzleHttp\Client` will be used as default.
//    new GuzzleHttp\Client(),
//    $config
//);
//
//$numero_processo = "0006175-55.2019.8.17.8227"; // string |
//$pje_action_id = 7; // int | é fornecido após se realizar a requisição de qualquer ação para o Intima.ai
//
//try {
//    $result = $apiInstance->getInfoProcessProtocoloHabilitacao($numero_processo, $pje_action_id);
//    var_dump($result);
//} catch (Exception $e) {
//    echo 'Exception when calling ProtocolosHabilitacaoGetInfoApi->getInfoProcessProtocoloHabilitacao: ', $e->getMessage(), PHP_EOL;
//}

//$apiInstance = new Swagger\Client\Api\ProtocolosHabilitacaoApi(
//// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
//// This is optional, `GuzzleHttp\Client` will be used as default.
//    new GuzzleHttp\Client(),
//    $config
//);
//
//$numero_processo = "0001165-06.2019.8.17.8235"; // string |
//$tipo_documento_mensagem_geral = 0; // int |
//$documentos = array(
//    new \Swagger\Client\Model\Documento([
//        'arquivo' => fopen('/Users/raunyhenrique/Downloads/TJPE - 0001165-06.2019.8.17.8235/habilitacao-1246635_1.pdf', 'r'),
//        'tipo_documento' => 31,
//        'descricao_documento' => 'habilitacao-1246635_1',
//        'order' => 1
//    ]),
//    new \Swagger\Client\Model\Documento([
//        'arquivo' => fopen('/Users/raunyhenrique/Downloads/TJPE - 0001165-06.2019.8.17.8235/proc-urbano-vitalino-1900467250-compressed_6.pdf', 'r'),
//        'tipo_documento' => 59,
//        'descricao_documento' => 'proc-urbano-vitalino-1900467250-compressed_6',
//        'order' => 2
//    ]),
//    new \Swagger\Client\Model\Documento([
//        'arquivo' => fopen('/Users/raunyhenrique/Downloads/TJPE - 0001165-06.2019.8.17.8235/atos-bradesco_3.pdf', 'r'),
//        'tipo_documento' => 11,
//        'descricao_documento' => 'atos-bradesco_3',
//        'order' => 3
//    ]),
//    new \Swagger\Client\Model\Documento([
//        'arquivo' => fopen('/Users/raunyhenrique/Downloads/TJPE - 0001165-06.2019.8.17.8235/est-banco-bradesco-ageo-parte-1_7.pdf', 'r'),
//        'tipo_documento' => 11,
//        'descricao_documento' => 'est-banco-bradesco-ageo-parte-1_7',
//        'order' => 4
//    ]),
//    new \Swagger\Client\Model\Documento([
//        'arquivo' => fopen('/Users/raunyhenrique/Downloads/TJPE - 0001165-06.2019.8.17.8235/est-banco-bradesco-parte-2_8.pdf', 'r'),
//        'tipo_documento' => 11,
//        'descricao_documento' => 'est-banco-bradesco-parte-2_8',
//        'order' => 5
//    ]),
//    new \Swagger\Client\Model\Documento([
//        'arquivo' => fopen('/Users/raunyhenrique/Downloads/TJPE - 0001165-06.2019.8.17.8235/est-banco-bradesco-reca-parte-3_9.pdf', 'r'),
//        'tipo_documento' => 11,
//        'descricao_documento' => 'est-banco-bradesco-reca-parte-3_9',
//        'order' => 6
//    ])
//); // \Swagger\Client\Model\Documento[] |
//$mensagem_geral = "SEGUE EM ANEXO";// string | opcional
//$descricao = "Protocolo de habilitação";// string | opcional
//$protocolo_habilitacao_id = 3; // int | é o id referente ao tribunal cadastrado em \"Tribunais ativos\" no Intima.ai
//
//$tipo_solicitacao = 0;
//$tipo_declaracao = 0;
//$polo = 1;
//$partes_vinculadas = [
//    'BANCO BRADESCO S/A - CNPJ: 60.746.948/0001-12 (DEMANDADO)'
//];
//
//try {
//    $result = $apiInstance->createProcessProtocoloHabilitacao($numero_processo, $tipo_solicitacao, $tipo_declaracao, $polo, $partes_vinculadas, $tipo_documento_mensagem_geral, $documentos, $protocolo_habilitacao_id, $mensagem_geral, $descricao);
//    var_dump($result);
//} catch (Exception $e) {
//    echo 'Exception when calling ProtocolosHabilitacaoGetInfoApi->getInfoProcessProtocoloHabilitacao: ', $e->getMessage(), PHP_EOL;
//}

$apiInstance = new Swagger\Client\Api\ProtocolosApi(
// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
// This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

//$documentos = array(
//    new \Swagger\Client\Model\Documento([
//        'arquivo' => fopen('/Users/raunyhenrique/Downloads/TJPE - 0001165-06.2019.8.17.8235/habilitacao-1246635_1.pdf', 'r'),
//        'tipo_documento' => 31,
//        'descricao_documento' => 'habilitacao-1246635_1',
//        'order' => 1
//    ])
//);

$documento_1 = new \Swagger\Client\Model\Documento();
$documento_1
    ->setArquivo(fopen('/Users/raunyhenrique/Downloads/peticao.pdf', 'r'))
    ->setTipoDocumento(28)
    ->setDescricaoDocumento('peticao')
    ->setOrder(1);

$documentos = array($documento_1);

$protocolo = new \Swagger\Client\Model\Protocolo();

$peticao = new \Swagger\Client\Model\Peticao();
$peticao
    ->setArquivo(fopen('/Users/raunyhenrique/Downloads/peticao_1.pdf', 'r'))
    ->setTipoDocumento(1)
    ->setDescricaoDocumento('peticao_1');

$protocolo
    ->setNumeroProcesso('8015976-29.2019.8.05.0001')
    ->setTipoDocumentoMensagemGeral(2)
    ->setPeticao($peticao)
    ->setDescricao('Apelação')
    ->setDocumentos($documentos);

$pje_auth_id = 1;

try {
    $result = $apiInstance->createProcessProtocolo($protocolo, $pje_auth_id);
    var_dump($result);
} catch (Exception $e) {
    echo 'Exception when calling ProtocolosApi->createProcessProtocolo: ', $e->getMessage(), PHP_EOL;
}