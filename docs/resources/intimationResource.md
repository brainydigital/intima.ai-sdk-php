# **intimationResource**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getById**](intimationResource.md#getById) | **GET** /intimations/{id} | Visualiza uma intimação
[**markAsRevised**](intimationResource.md#markAsRevised) | **PUT** /intimations/{intimation_id}/mark-as-revised | Marca uma intimação como revisada

# **getById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente a intimação no Intima.ai | [obrigatório]

# **markAsRevised**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**intimationId** | **number**| é o id referente a intimação no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $result = $intimaai->intimationResource->getById(45217);
    dump($result);

    $paginator = $intimaai->intimationResource->paginate();
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
[[Voltar para o README]](../../README.md#Intima.ai---SDK-NodeJS)
