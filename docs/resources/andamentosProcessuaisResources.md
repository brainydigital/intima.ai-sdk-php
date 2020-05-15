# **andamentosProcessuaisResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](andamentosProcessuaisResources.md#consultarPorId) | **GET** /process-courses/{id} | Visualiza um andamento processual
[**cadastrarNovoAndamento**](andamentosProcessuaisResources.md#cadastrarNovoAndamento) | **POST** /process-courses | Cadastra um novo andamento processual
[**capturarAndamentos**](andamentosProcessuaisResources.md#capturarAndamentos) | **GET** /actions/process-courses/{course_id}/capture | Captura os andamentos processuais de um andamento processual previamente cadastrado no Intima.ai
[**cadastrarNovoAndamentoECapturarAndamentos**](andamentosProcessuaisResources.md#cadastrarNovoAndamentoECapturarAndamentos) | **POST** /actions/process-courses/create-and-capture | Cadastra e captura os andamento processuais no Intima.ai
[**consultarResultadosDoAndamento**](andamentosProcessuaisResources.md#consultarResultadosDoAndamento) | **GET** /process-courses/{course_id}/results | Retorna um *Paginator* com os andamento processuais capturados
[**excluirAndamento**](andamentosProcessuaisResources.md#excluirAndamento) | **DELETE** /process-courses/{course_id} | Exclui um andamento processual

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

# **cadastrarNovoAndamento**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**course** | [**AndamentoProcessual**](../models/process_course/AndamentoProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

# **capturarAndamentos**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**courseId** | **int**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

# **cadastrarNovoAndamentoECapturarAndamentos**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**course** | [**AndamentoProcessual**](../models/process_course/AndamentoProcessual.md) | parametros necessários para a criação e captura de um novo registro | [obrigatório]

# **consultarResultadosDoAndamento**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**courseId** | **int**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

# **excluirAndamento**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**courseId** | **int**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\AndamentoProcessual;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->andamentosProcessuaisResources->consultarPorId(45217);
    dump($resultById);

    $newCourse = new AndamentoProcessual('0000000-00.0000.0.00.0000', 120);
    $resultNew = $intimaai->andamentosProcessuaisResources->cadastrarNovoAndamento($newCourse);
    dump($resultNew);

    $resultCapture = $intimaai->andamentosProcessuaisResources->capturarAndamentos(12);
    dump($resultCapture);

    $paginatorResults = $intimaai->andamentosProcessuaisResources->consultarResultadosDoAndamento(21);
    $paginatorResults->getPage(1);

    $resultDelete = $intimaai->andamentosProcessuaisResources->excluirAndamento(12);
    dump($resultDelete);

    $paginator = $intimaai->andamentosProcessuaisResources->paginate();
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
