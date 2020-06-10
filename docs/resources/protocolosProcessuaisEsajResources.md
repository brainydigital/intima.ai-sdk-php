# **protocolosProcessuaisEsajResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**cadastrarPrimeiraEtapaParaNovoProtocoloEsaj**](protocolosProcessuaisEsajResources.md#cadastrarPrimeiraEtapaParaNovoProtocoloEsaj) | **GET** /process-protocols-esaj/{id} | Cadastra um novo protocolo, e coleta as informações iniciais para a primeira etapa
[**cadastrarSegundaEtapaParaNovoProtocoloEsaj**](protocolosProcessuaisEsajResources.md#cadastrarSegundaEtapaParaNovoProtocoloEsaj) | **POST** /actions/process-protocols-esaj | Finaliza o protoco. Está é a segunda e ultima etapa do protocolo no ESAJ

# **cadastrarPrimeiraEtapaParaNovoProtocoloEsaj**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**protocol** | [**PrimeiraEtapaParaProtocoloProcessualEsaj**](../models/protocol/PrimeiraEtapaParaProtocoloProcessualEsaj.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\PrimeiraEtapaParaProtocoloProcessualEsaj;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $protocolPrimeiraEtapa = new PrimeiraEtapaParaProtocoloProcessualEsaj('0000000-00.0000.0.00.0000', 1);

    $resultNew = $intimaai->protocolosProcessuaisEsajResources->cadastrarPrimeiraEtapaParaNovoProtocoloEsaj($protocolPrimeiraEtapa);
    dump($resultNew);
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

# **cadastrarSegundaEtapaParaNovoProtocoloEsaj**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**protocolId** | **int**| é o id referente ao protocolo cadastrado no Intima.ai, fornecido na primeira etapa | [obrigatório]
**protocol** | [**SegundaEtapaParaProtocoloProcessualEsaj**](../models/protocol/SegundaEtapaParaProtocoloProcessualEsaj.md) | parametros necessários para a segunda e ultima etapa do protocolo no ESAJ | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\ParteVinculada;
use Intimaai\Models\Peticao;
use Intimaai\Models\Documento;
use Intimaai\Models\SegundaEtapaParaProtocoloProcessualEsaj;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $peticao = new Peticao('/path/to/doc.pdf', 0);
    $doc = new Documento('/path/to/anexo.pdf', 0, 'anexo', 1);
    $partes = [
        new ParteVinculada('BANCO FULANO')
    ];
    $protocolSegundaEtapa = new SegundaEtapaParaProtocoloProcessualEsaj(1, 2, $partes, $peticao, [$doc]);

    $result = $intimaai->protocolosProcessuaisEsajResources->cadastrarSegundaEtapaParaNovoProtocoloEsaj(53, $protocolSegundaEtapa);
    dump($result);
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
