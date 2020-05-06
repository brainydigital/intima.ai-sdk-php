# **listenerResource**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getById**](listenerResource.md#getById) | **GET** /process-listeners/{id} | Visualiza a escuta processual
[**getNewListener**](listenerResource.md#getNewListener) | **POST** /process-listeners | Cadastra uma nova escuta processual
[**captureListener**](listenerResource.md#captureListener) | **GET** /actions/process-listeners/{listener_id}/capture | Executa a escuta processual
[**getNewListenerAndCapture**](listenerResource.md#getNewListenerAndCapture) | **POST** /actions/process-listeners/create-and-capture| Cadastra e executa a escuta processual
[**getListenerResults**](listenerResource.md#getListenerResults) | **GET** /process-listeners/{listener_id}/results | Retorna os resultados da escuta processual
[**updateListener**](listenerResource.md#updateListener) | **PUT** /process-listeners/{listener_id} | Atualiza uma escuta processual
[**deleteListener**](listenerResource.md#deleteListener) | **DELETE** /process-listeners/{listener_id} | Exclui uma escuta processual

# **getById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente a escuta processual no Intima.ai | [obrigatório]

# **getNewListener**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listener** | **Listener**| parametros necessários para a criação de um novo registro | [obrigatório]

# **captureListener**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listenerId** | **number**| é o id referente a escuta processual no Intima.ai | [obrigatório]

# **getNewListenerAndCapture**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listener** | **Listener**| parametros necessários para a criação de um novo registro | [obrigatório]

# **getListenerResults**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listenerId** | **number**| é o id referente a escuta processual no Intima.ai | [obrigatório]

# **updateListener**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listenerId** | **number**| é o id referente a escuta processual no Intima.ai | [obrigatório]
**listener** | **ListenerUpdate**| parametros necessários para a atualizar o registro | [obrigatório]

# **deleteListener**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listenerId** | **number**| é o id referente a escuta processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $result = $intimaai->listenerResource->getById(45217);
    dump($result);

    $paginator = $intimaai->listenerResource->paginate();
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
