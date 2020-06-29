# **protocolosDeHabilitacao**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](protocolosDeHabilitacaoResources.md#consultarPorId) | **GET** /protocolos-de-habilitacao/{id} | Visualiza um protocolo de habilitação pelo id
[**cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao**](protocolosDeHabilitacaoResources.md#cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao) | **POST** /acoes/protocolos-de-habilitacao | Cadastra um novo protocolo de habilitação, e coleta as informações iniciais para a primeira etapa
[**cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao**](protocolosDeHabilitacaoResources.md#cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao) | **POST** /acoes/protocolos-de-habilitacao/{protocolo_habilitacao_id} | Finaliza o protoco de habilitação, está é a segunda e ultima etapa do protocolo de habilitação

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **id**| é o id referente ao protocolo de habilitação cadastrado no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->protocolosDeHabilitacao->consultarPorId(45217);
    dump($resultado);
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

# **cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**primeiraEtapaParaProtocoloDeHabilitacao** | [**PrimeiraEtapaParaProtocoloDeHabilitacao**](../models/qualification_protocol/PrimeiraEtapaParaProtocoloDeHabilitacao.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\PrimeiraEtapaParaProtocoloDeHabilitacao;

try 
{
    $intimaai = new Intimaai('api_token');

    $protocolo = new PrimeiraEtapaParaProtocoloDeHabilitacao('0000000-00.0000.0.00.0000', 1);
    $resultado = $intimaai->protocolosDeHabilitacao->cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao($protocolo);
    dump($resultado);
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

# **cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**protocoloDeHabilitacaoId** | **int**| é o id referente ao protocolo de habilitação cadastrado no Intima.ai, fornecido na primeira etapa | [obrigatório]
**segundaEtapaParaProtocoloDeHabilitacao** | [**SegundaEtapaParaProtocoloDeHabilitacao**](../models/qualification_protocol/SegundaEtapaParaProtocoloDeHabilitacao.md) | parametros necessários para a segunda e ultima etapa do protocolo de habilitação | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\Documento;
use Intimaai\Models\SegundaEtapaParaProtocoloDeHabilitacao;

try 
{
    $intimaai = new Intimaai('api_token');

    $doc = new Documento('/path/to/file.pdf', 0, 'anexo', 1);
    $protocolo = new SegundaEtapaParaProtocoloDeHabilitacao(0, 0, 1, ['BANCO FULANO'], 0, [$doc]);
    $resultado = $intimaai->protocolosDeHabilitacao->cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao(41, $protocolo);
    dump($resultado);
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
