# **protocolosProcessuaisPje**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](protocolosProcessuaisResources.md#consultarPorId) | **GET** /pje/protocolos-processuais/{protocolo_id} | Visualiza um protocolo
[**cadastrarNovoProtocolo**](protocolosProcessuaisResources.md#cadastrarNovoProtocolo) | **POST** /acoes/pje/protocolos-processuais | Cadastra um novo protocolo para o PJE

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao protocolo no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->protocolosProcessuaisPje->consultarPorId(45217);
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

# **cadastrarNovoProtocolo**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**protocoloProcessual** | [**ProtocoloProcessual**](../models/protocol/ProtocoloProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\Documento;
use Intimaai\Models\ProtocoloProcessual;

try 
{
    $intimaai = new Intimaai('api_token');
    
//    $peticao = new Peticao('/path/to/doc.pdf', 0, 'doc');
    $doc = new Documento('/path/to/anexo.pdf', 0, 'anexo', 1);
    $protocolo = new ProtocoloProcessual('0000000-00.0000.0.00.0000', 1, 0, null, null, null, [$doc]);

    $resultado = $intimaai->protocolosProcessuaisPje->cadastrarNovoProtocolo($protocolo);
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
