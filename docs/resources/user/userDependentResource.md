# **userDependentResource**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getById**](userDependentResource.md#getById) | **GET** /user-dependents | Visualiza um dependente do usuário
[**getNewUserDependent**](userDependentResource.md#getNewUserDependent) | **POST** /user-dependents | Cadastra um novo dependente do usuário
[**updateUserDependent**](userDependentResource.md#updateUserDependent) | **PUT** /user-dependents/{user_dependent_id} | Atualiza um dependente do usuário
[**deleteUserDependent**](userDependentResource.md#deleteUserDependent) | **DELETE** /user-dependents/{user_dependent_id} | Exclui um dependente do usuário

# **getById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente ao dependente do usuário no Intima.ai | [obrigatório]

# **getNewUserDependent**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userDependent** | **Dependent**| parametros necessários para a criação de um novo registro | [obrigatório]

# **updateUserDependent**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userDependentId** | **number**| é o id referente ao dependente do usuário no Intima.ai | [obrigatório]
**userDependent** | **Dependent**| parametros necessários para a criação de um novo registro | [obrigatório]

# **deleteUserDependent**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userDependentId** | **number**| é o id referente ao dependente do usuário no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $result = $intimaai->userDependentResource->getById(45217);
    dump($result);

    $paginator = $intimaai->userDependentResource->paginate();
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
