# Recurso: **webhooks**

> Atravez deste recurso você poderá cadastrar e manter todos os webhooks que deseja ser notificado, 
>após o termino de uma ação realizada pelo `Intima.ai`.


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](webhooksResources.md#consultarPorId) | **GET** /usuarios-webhooks | Visualiza um webhook do usuário
[**cadastrarNovoWebhook**](webhooksResources.md#cadastrarNovoWebhook) | **POST** /usuarios-webhooks | Cadastra um novo webhook do usuário
[**atualizarWebhook**](webhooksResources.md#atualizarWebhook) | **PUT** /usuarios-webhooks/{webhook_id} | Atualiza um webhook do usuário
[**excluirWebhook**](webhooksResources.md#excluirWebhook) | **DELETE** /usuarios-webhooks/{webhook_id} | Exclui um webhook do usuário

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao webhook do usuário no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->webhooks->consultarPorId(45217);
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

# **cadastrarNovoWebhook**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**webhook** | [**Webhook**](../../models/webhook/Webhook.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\Webhook;

try 
{
    $intimaai = new Intimaai('api_token');

    $webhook = new Webhook(0, 'GET', 'https://example.com');
    $resultado = $intimaai->webhooks->cadastrarNovoWebhook($webhook);
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

# **atualizarWebhook**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**webhookId** | **int**| é o id referente ao webhook do usuário no Intima.ai | [obrigatório]
**webhook** | [**Webhook**](../../models/webhook/Webhook.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\Webhook;

try 
{
    $intimaai = new Intimaai('api_token');

    $webhook = new Webhook(0, 'POST', 'https://example.com');
    $resultado = $intimaai->webhooks->atualizarWebhook(2, $webhook);
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

# **excluirWebhook**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**webhookId** | **int**| é o id referente ao webhook do usuário no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->webhooks->excluirWebhook(2);
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
