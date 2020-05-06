# **processSearchResource**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getById**](processSearchResource.md#getById) | **GET** /process-searchs/{id} | Visualiza uma consulta processual
[**getNewSearch**](processSearchResource.md#getNewSearch) | **POST** /actions/process-searchs | Cadastra uma nova consulta processual
[**getSearchResults**](processSearchResource.md#getSearchResults) | **GET** /process-searchs/{search_id}/results | Retorna um *Paginator* com os processos capturados
[**getSearchAnalyses**](processSearchResource.md#getSearchAnalyses) | **GET** /process-searchs/search-analyses | Retorna um *Paginator* com as pré-análises previamente realizadas para as consultas processuais
[**getSearchAnalysesById**](processSearchResource.md#getSearchAnalysesById) | **GET** /process-searchs/search-analyses/{id} | Visualiza uma pré-análise que foi realizada para uma determinada consulta processual
[**getNewSearchAnalyses**](processSearchResource.md#getNewSearchAnalyses) | **POST** /actions/process-searchs/search-analyses | Cadastra uma nova pré-análise para uma determinada consulta processual

# **getById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente a consulta processual no Intima.ai | [obrigatório]

# **getNewSearch**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**search** | **Search**| parametros necessários para a criação de um novo registro | [obrigatório]

# **getSearchResults**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**searchId** | **number**| é o id referente a consulta processual no Intima.ai | [obrigatório]

# **getSearchAnalyses**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
- | - | - | -

# **getSearchAnalysesById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente a consulta processual no Intima.ai | [obrigatório]

# **getNewSearchAnalyses**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**searchAnalyse** | **SearchAnalyse**| parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $result = $intimaai->processSearchResource->getById(45217);
    dump($result);

    $paginator = $intimaai->processSearchResource->paginate();
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
