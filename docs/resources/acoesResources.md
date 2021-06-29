# Recurso: **acoes**

> Todas as ações realizadas dentro do `Intima.ai`, ficam registradas neste recurso. Você pode 
>utilizar o método `consultarResultadosDaAcao` para visualizar detalhamente os resultados da ação 
>solicitada.


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Método | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](acoesResources.md#consultarPorId) | **GET** /acoes/{id} | Visualiza uma ação pelo id
[**consultarResultadosDaAcao**](acoesResources.md#consultarResultadosDaAcao) | **GET** /acoes/{acao_id}/resultados | Retorna um [**Paginator**](../models/api/Paginator.md) com os resultados de uma ação

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente a ação no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultados = $intimaai->acoes->consultarPorId(45217);
    dump($resultados);
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

# **consultarResultadosDaAcao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**acaoId** | **int**| é o id referente a ação no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultados = $intimaai->acoes->consultarResultadosDaAcao(45217);
    $resultados->obterPagina(1);

    dump($resultados->obterColecao());
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
