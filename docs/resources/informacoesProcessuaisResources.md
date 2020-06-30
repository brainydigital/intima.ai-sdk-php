# Recurso: **informacoesProcessuais**

> Com as informações processuais, você poderá obter todas as informações do processo, tais como: 
>valor da causa, classe judicial, assuntos, polos e etc.


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](informacoesProcessuaisResources.md#consultarPorId) | **GET** /informacoes-processuais/{id} | Visualiza as informações processuais por id
[**capturarNovaInformacaoProcessual**](informacoesProcessuaisResources.md#capturarNovaInformacaoProcessual) | **POST** /acoes/informacoes-processuais | Cadastra uma nova captura de informações processuais de um processo

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente as informações processuais capturadas no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->informacoesProcessuais->consultarPorId(45217);
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

# **capturarNovaInformacaoProcessual**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**informacaoProcessual** | [**InformacaoProcessual**](../models/process_info/InformacaoProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\InformacaoProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $processoInfo = new InformacaoProcessual('00000000000000000000', 120);
    $resultado = $intimaai->informacoesProcessuais->capturarNovaInformacaoProcessual($processoInfo);
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
