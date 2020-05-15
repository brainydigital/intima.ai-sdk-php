# **consultasProcessuaisResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](consultasProcessuaisResources.md#consultarPorId) | **GET** /process-searchs/{id} | Visualiza uma consulta processual
[**cadastrarNovaConsulta**](consultasProcessuaisResources.md#cadastrarNovaConsulta) | **POST** /actions/process-searchs | Cadastra uma nova consulta processual
[**consultarResultadosDaConsulta**](consultasProcessuaisResources.md#consultarResultadosDaConsulta) | **GET** /process-searchs/{search_id}/results | Retorna um [**Paginator**](../models/api/Paginator.md) com os processos capturados
[**listarPreAnalisesDeConsultas**](consultasProcessuaisResources.md#listarPreAnalisesDeConsultas) | **GET** /process-searchs/search-analyses | Retorna um [**Paginator**](../models/api/Paginator.md) com as pré-análises previamente realizadas para as consultas processuais
[**consultarPorIdPreAnaliseDeConsulta**](consultasProcessuaisResources.md#consultarPorIdPreAnaliseDeConsulta) | **GET** /process-searchs/search-analyses/{id} | Visualiza uma pré-análise que foi realizada para uma determinada consulta processual
[**cadastrarPreAnaliseDeConsulta**](consultasProcessuaisResources.md#cadastrarPreAnaliseDeConsulta) | **POST** /actions/process-searchs/search-analyses | Cadastra uma nova pré-análise para uma determinada consulta processual

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente a consulta processual no Intima.ai | [obrigatório]

# **cadastrarNovaConsulta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**search** | [**ConsultaProcessual**](../models/process_search/ConsultaProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

# **consultarResultadosDaConsulta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**searchId** | **int**| é o id referente a consulta processual no Intima.ai | [obrigatório]

# **listarPreAnalisesDeConsultas**

### Parametros

Este método não possui parametros

# **consultarPorIdPreAnaliseDeConsulta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente a consulta processual no Intima.ai | [obrigatório]

# **cadastrarPreAnaliseDeConsulta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**searchAnalyse** | [**PreAnaliseDeConsultaProcessual**](../models/process_search/PreAnaliseDeConsultaProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\ConsultaProcessual;
use Intimaai\Models\PreAnaliseDeConsultaProcessual;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->consultasProcessuaisResources->consultarPorId(45217);
    dump($resultById);

    $processSearch = new ConsultaProcessual(1, '0000000-00.0000.0.00.0000');
    $resultNew = $intimaai->consultasProcessuaisResources->cadastrarNovaConsulta($processSearch);
    dump($resultNew);

    $resultsPaginator= $intimaai->consultasProcessuaisResources->consultarResultadosDaConsulta(31);
    $resultsPaginator->getPage(1);
    dump($resultsPaginator);

    $paginator = $intimaai->consultasProcessuaisResources->paginate();
    $paginator->getPage(1);
    dump($paginator->getCollection());

    $resultPreAnalyse = $intimaai->consultasProcessuaisResources->consultarPorIdPreAnaliseDeConsulta(1);
    dump($resultById);

    $processSearchAnalyse = new PreAnaliseDeConsultaProcessual(1, '0000000-00.0000.0.00.0000');
    $resultNewPreAnalyse = $intimaai->consultasProcessuaisResources->cadastrarPreAnaliseDeConsulta($processSearchAnalyse);
    dump($resultNewPreAnalyse);

    $resultsAnalysesPaginator= $intimaai->consultasProcessuaisResources->listarPreAnalisesDeConsultas();
    $resultsAnalysesPaginator->getPage(1);
    dump($resultsAnalysesPaginator);
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
