# **copiasProcessuaisResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](copiasProcessuaisResources.md#consultarPorId) | **GET** /process-copies/{id} | Visualiza as informações processuais por id
[**cadastrarNovaCopia**](copiasProcessuaisResources.md#cadastrarNovaCopia) | **POST** /actions/process-copies | Cadastra uma nova cópia processual

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente a cópia processual no Intima.ai | [obrigatório]

# **cadastrarNovaCopia**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**copy** | [**CopiaProcessual**](../models/copy/CopiaProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\CopiaProcessual;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->copiasProcessuaisResources->consultarPorId(45217);
    dump($resultById);

    $newCopy = new CopiaProcessual('0000000-00.0000.0.00.0000', 1);
    $resultNew = $intimaai->copiasProcessuaisResources->cadastrarNovaCopia($newCopy);
    dump($resultNew);

    $paginator = $intimaai->copiasProcessuaisResources->paginate();
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
