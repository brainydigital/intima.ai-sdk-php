# **qualificationProtocolResource**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getById**](qualificationProtocolResource.md#getById) | **GET** /process-qualification-protocols/{id} | Visualiza um certificado
[**getNewQualificationProtocolFirstStep**](qualificationProtocolResource.md#getNewQualificationProtocolFirstStep) | **POST** /actions/process-qualification-protocols | Cadastra um novo certificado
[**getNewQualificationProtocolSecondStep**](qualificationProtocolResource.md#getNewQualificationProtocolSecondStep) | **PUT** /actions/process-qualification-protocols/{qualification_protocol_id} | Atualiza um certificado

# **getById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente ao protocolo de habilitação cadastrado no Intima.ai | [obrigatório]

# **getNewQualificationProtocolFirstStep**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**qualificationProtocol** | **FirstStepQualificationProtocol**| parametros necessários para a criação de um novo registro | [obrigatório]

# **getNewQualificationProtocolSecondStep**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**qualificationProtocolId** | **number**| é o id referente ao protocolo de habilitação cadastrado no Intima.ai, fornecido na primeira etapa | [obrigatório]
**qualificationProtocol** | **SecondStepQualificationProtocol**| parametros necessários para a segunda e ultima etapa do protocolo de habilitação | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $result = $intimaai->qualificationProtocolResource->getById(45217);
    dump($result);

    $paginator = $intimaai->qualificationProtocolResource->paginate();
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
