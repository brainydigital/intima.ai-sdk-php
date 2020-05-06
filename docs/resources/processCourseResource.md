# **processCourseResource**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getById**](processCourseResource.md#getById) | **GET** /process-courses/{id} | Visualiza um andamento processual
[**getNewCourse**](processCourseResource.md#getNewCourse) | **POST** /process-courses | Cadastra um novo andamento processual
[**captureCourse**](processCourseResource.md#captureCourse) | **GET** /actions/process-courses/{course_id}/capture | Captura os andamentos processuais de um andamento processual previamente cadastrado no Intima.ai
[**getNewCourseAndCapture**](processCourseResource.md#getNewCourseAndCapture) | **POST** /actions/process-courses/create-and-capture | Cadastra e captura os andamento processuais no Intima.ai
[**getCourseResults**](processCourseResource.md#getCourseResults) | **GET** /process-courses/{course_id}/results | Retorna um *Paginator* com os andamento processuais capturados
[**deleteCourse**](processCourseResource.md#deleteCourse) | **DELETE** /process-courses/{course_id} | Exclui um andamento processual

# **getById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

# **getNewCourse**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**course** | **Course**| parametros necessários para a criação de um novo registro | [obrigatório]

# **captureCourse**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**courseId** | **number**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

# **getNewCourseAndCapture**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**course** | **Course**| parametros necessários para a criação e captura de um novo registro | [obrigatório]

# **getCourseResults**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**courseId** | **number**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

# **deleteCourse**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**courseId** | **number**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $result = $intimaai->processCourseResource->getById(45217);
    dump($result);

    $paginator = $intimaai->processCourseResource->paginate();
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
