# **userWebhookResource**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getById**](userWebhookResource.md#getById) | **GET** /user-webhooks | Visualiza um webhook do usuário
[**getNewUserWebhook**](userWebhookResource.md#getNewUserWebhook) | **POST** /user-webhooks | Cadastra um novo webhook do usuário
[**updateUserWebhook**](userWebhookResource.md#updateUserWebhook) | **PUT** /user-webhooks/{user_webhook_id} | Atualiza um webhook do usuário
[**deleteUserWebhook**](userWebhookResource.md#deleteUserWebhook) | **DELETE** /user-webhooks/{user_webhook_id} | Exclui um webhook do usuário

# **getById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente ao webhook do usuário no Intima.ai | [obrigatório]

# **getNewUserWebhook**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userWebhook** | **Webhook**| parametros necessários para a criação de um novo registro | [obrigatório]

# **updateUserWebhook**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userWebhookId** | **number**| é o id referente ao webhook do usuário no Intima.ai | [obrigatório]
**userWebhook** | **Webhook**| parametros necessários para a criação de um novo registro | [obrigatório]

# **deleteUserWebhook**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userWebhookId** | **number**| é o id referente ao webhook do usuário no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $result = $intimaai->userWebhookResource->getById(45217);
    dump($result);

    $paginator = $intimaai->userWebhookResource->paginate();
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
