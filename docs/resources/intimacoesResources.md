# Recurso: **intimacoes**

> As capturas de intimações ocorrem em determinados horários e dias escolhidos por você, ao se adicionar um tribunal em `Tribunais ativos`.
>
> Para cada "Tribunal ativo" na sua lista de Tribunais ativos, você pode ou não habilitar a 
>captura de intimações. Caso a captura de intimações esteja habilitada para o tribunal selecionado, 
>será necessario informar os dias da semana em que ocorrerão as capturas, bem como ao menos um 
>horário para captura e também quais as abas que deseja que o `INTIMA.AI` realize a captura das 
>intimações.
>
> Após finalizada a ação de captura de intimações, será possível verificar todos os documentos 
>atrelados as intimações (em texto ou em PDF), bem como realizar a revisão das intimações.


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](intimacoesResources.md#consultarPorId) | **GET** /intimacoes/{id} | Visualiza uma intimação
[**marcarIntimacaoComoRevisada**](intimacoesResources.md#marcarIntimacaoComoRevisada) | **PUT** /intimacoes/{intimacao_id}/marcar-como-revisada | Marca uma intimação como revisada

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente a intimação no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->intimacoes->consultarPorId(45217);
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

# **marcarIntimacaoComoRevisada**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**intimacaoId** | **int**| é o id referente a intimação no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->intimacoes->marcarIntimacaoComoRevisada(45217);
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
