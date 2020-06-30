# Recurso: **tribunais**

> Os tribunais correspondem a todos os sistemas jurídicos disponíveis no `Intima.ai` 
> (PJE, ESAJ, PROJUDI e etc). 
>
> Para cada tribunal, você pode definir se deseja realizar as captura de intimações 
> (definir dias e horários do seu agrado) e associar uma `Autenticação`.
> 
> A `Autenticação` pode ser um certificado A1 ou login e senha, mas sempre deve-se 
> ficar atento as funcionalidades suportadas por cada tribunal.


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](tribunaisResources.md#consultarPorId) | **GET** /tribunais/{id} | Visualiza um tribunal

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao tribunal disponível no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->tribunais->consultarPorId(45217);
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
