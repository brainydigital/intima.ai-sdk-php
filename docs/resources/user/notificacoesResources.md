# **notificacoesResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](notificacoesResources.md#consultarPorId) | **GET** /user-notifications/{user_email_notification_id} | Visualiza um email cadastrado para receber notificações
[**cadastrarNovoEmailParaNotificacoes**](notificacoesResources.md#cadastrarNovoEmailParaNotificacoes) | **POST** /user-notifications | Cadastra um novo email para receber notificações
[**atualizarEmailParaNotificacoes**](notificacoesResources.md#atualizarEmailParaNotificacoes) | **PUT** /user-notifications/{user_email_notification_id} | Atualiza um email para receber notificações
[**excluirEmailParaNotificacoes**](notificacoesResources.md#excluirEmailParaNotificacoes) | **DELETE** /user-notifications/{user_email_notification_id} | Exclui um email, que deixara de receber notificações

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao dependente do usuário no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->notificacoesResources->consultarPorId(45217);
    dump($resultById);
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

# **cadastrarNovoEmailParaNotificacoes**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**email** | **string**| email que deseja cadastrar para receber notificações | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultNew = $intimaai->notificacoesResources->cadastrarNovoEmailParaNotificacoes('user@email.com');
    dump($resultNew);
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

# **atualizarEmailParaNotificacoes**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userEmailNotification_id** | **int**| é o id referente ao email cadastrado que recebe notificações | [obrigatório]
**email** | **string**| email que deseja atualizar para receber notificações | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resulUpdate = $intimaai->notificacoesResources->atualizarEmailParaNotificacoes(3, 'user2@email.com');
    dump($resulUpdate);
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

# **excluirEmailParaNotificacoes**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userEmailNotificationId** | **int**| é o id referente ao email cadastrado que recebe notificações | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resulDelete = $intimaai->notificacoesResources->excluirEmailParaNotificacoes(3);
    dump($resulDelete);
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
