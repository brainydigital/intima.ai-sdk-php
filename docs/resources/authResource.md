# **authResource**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getById**](authResource.md#getById) | **GET** /auths/{id} | Visualiza um auth
[**getNewAuth**](authResource.md#getNewAuth) | **POST** /auths | Cadastra um novo auth
[**enableIntimationsAuth**](authResource.md#enableIntimationsAuth) | **PUT** /auths/{auth_id}/intimations/enable | Ativa a captura de intimações para um auth
[**disableIntimationsAuth**](authResource.md#disableIntimationsAuth) | **PUT** /auths/{auth_id}/intimations/disable | Desativa a captura de intimações para um auth

# **getById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]

# **getNewAuth**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**auth** | **NewAuth**| parametros necessários para a criação de um novo registro | [obrigatório]

# **enableIntimationsAuth**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**authId** | **number**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]
**enableAuth** | **EnableAuth**| parametros necessários para a ativação da captura de intimações | [obrigatório]

# **disableIntimationsAuth**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**authId** | **number**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $result = $intimaai->authResource->getById(45217);
    dump($result);

    $paginator = $intimaai->authResource->paginate();
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
