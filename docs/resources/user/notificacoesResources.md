# Recurso: **notificacoes**

> Atravez deste recurso você poderá ter o controle de todos os outros emails em que se deseja 
>receber notificações, além do seu email principal.


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](notificacoesResources.md#consultarPorId) | **GET** /usuarios-notificacoes/{email_notificacao_id} | Visualiza um email cadastrado para receber notificações
[**cadastrarNovoEmailParaNotificacoes**](notificacoesResources.md#cadastrarNovoEmailParaNotificacoes) | **POST** /usuarios-notificacoes | Cadastra um novo email para receber notificações
[**atualizarEmailParaNotificacoes**](notificacoesResources.md#atualizarEmailParaNotificacoes) | **PUT** /usuarios-notificacoes/{email_notificacao_id} | Atualiza um email para receber notificações
[**excluirEmailParaNotificacoes**](notificacoesResources.md#excluirEmailParaNotificacoes) | **DELETE** /usuarios-notificacoes/{email_notificacao_id} | Exclui um email pelo id, que deixara de receber notificações

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
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->notificacoes->consultarPorId(45217);
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
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->notificacoes->cadastrarNovoEmailParaNotificacoes('user@email.com');
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

# **atualizarEmailParaNotificacoes**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**emailNotificacaoId** | **int**| é o id referente ao email cadastrado que recebe notificações | [obrigatório]
**email** | **string**| email que deseja atualizar para receber notificações | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->notificacoes->atualizarEmailParaNotificacoes(3, 'user2@email.com');
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

# **excluirEmailParaNotificacoes**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**emailNotificacaoId** | **int**| é o id referente ao email cadastrado que recebe notificações | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->notificacoes->excluirEmailParaNotificacoes(3);
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
[[Voltar a lista da API]](../../../README.md#Documentação-para-os-Endpoints-da-API)    
[[Voltar para o README]](../../../README.md#Intima.ai---SDK-PHP)
