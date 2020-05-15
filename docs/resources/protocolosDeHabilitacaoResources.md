# **protocolosDeHabilitacaoResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](protocolosDeHabilitacaoResources.md#consultarPorId) | **GET** /process-qualification-protocols/{id} | Visualiza um protocolo de habilitação pelo id
[**cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao**](protocolosDeHabilitacaoResources.md#cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao) | **POST** /actions/process-qualification-protocols | Cadastra um novo protocolo de habilitação, e coleta as informações iniciais para a primeira etapa
[**cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao**](protocolosDeHabilitacaoResources.md#cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao) | **POST** /actions/process-qualification-protocols/{qualification_protocol_id} | Finaliza o protoco de habilitação, está é a segunda e ultima etapa do protocolo de habilitação

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **id**| é o id referente ao protocolo de habilitação cadastrado no Intima.ai | [obrigatório]

# **cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**qualificationProtocol** | [**PrimeiraEtapaParaProtocoloDeHabilitacao**](../models/qualification_protocol/PrimeiraEtapaParaProtocoloDeHabilitacao.md) | parametros necessários para a criação de um novo registro | [obrigatório]

# **cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**qualificationProtocolId** | **int**| é o id referente ao protocolo de habilitação cadastrado no Intima.ai, fornecido na primeira etapa | [obrigatório]
**qualificationProtocol** | [**SegundaEtapaParaProtocoloDeHabilitacao**](../models/qualification_protocol/SegundaEtapaParaProtocoloDeHabilitacao.md) | parametros necessários para a segunda e ultima etapa do protocolo de habilitação | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\Documento;
use Intimaai\Models\PrimeiraEtapaParaProtocoloDeHabilitacao;
use Intimaai\Models\SegundaEtapaParaProtocoloDeHabilitacao;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->protocolosDeHabilitacaoResources->consultarPorId(45217);
    dump($resultById);

    $protocol = new PrimeiraEtapaParaProtocoloDeHabilitacao('0000000-00.0000.0.00.0000', 1);
    $resultNewFirstStep = $intimaai->protocolosDeHabilitacaoResources->cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao($protocol);
    dump($resultNewFirstStep);

    $doc = new Documento('/path/to/file.pdf', 0, 'anexo', 1);
    $protocolSecondStep = new SegundaEtapaParaProtocoloDeHabilitacao(0, 0, 1, ['BANCO FULANO'], 0, [$doc]);
    $resultNewSecondStep = $intimaai->protocolosDeHabilitacaoResources->cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao(41, $protocolSecondStep);
    dump($resultNewSecondStep);

    $paginator = $intimaai->protocolosDeHabilitacaoResources->paginate();
    $paginator->getPage(1);

    dump($paginator->getCollection());
}
catch (APIRequestException $exception)
{
    dump($exception->toJson());
}
catch (\Exception $exception)
{
    dump($exception->getMessage());
}
?>
```

[[Voltar ao topo]](#)        
[[Voltar a lista da API]](../../README.md#Documentação-para-os-Endpoints-da-API)    
[[Voltar para o README]](../../README.md#Intima.ai---SDK-PHP)
