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


$apiInstance = new Swagger\Client\Api\ProtocolosHabilitacaoApi(
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

$tipo_solicitacao = 0;
$tipo_declaracao = 0;
$polo = 1;
$partes_vinculadas = [
    'FACS SERVICOS EDUCACIONAIS LTDA - CNPJ: 13.526.884/0001-64 (RÉU)',
    'UNIVERSIDADE SALVADOR - UNIFACS (RÉU)'
];

try {
    $result = $apiInstance->createProcessProtocoloHabilitacao($numero_processo, $tipo_solicitacao, $tipo_declaracao, $polo, $tipo_documento_mensagem_geral, $documentos, $pje_auth_id, $mensagem_geral, $descricao);
    var_dump($result);
} catch (Exception $e) {
    echo 'Exception when calling ProtocolosHabilitacaoGetInfoApi->getInfoProcessProtocoloHabilitacao: ', $e->getMessage(), PHP_EOL;
}