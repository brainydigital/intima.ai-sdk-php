# **autenticacoesResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](autenticacoesResources.md#consultarPorId) | **GET** /auths/{id} | Visualiza um auth
[**cadastrarNovaAutenticacao**](autenticacoesResources.md#cadastrarNovaAutenticacao) | **POST** /auths | Cadastra um novo auth
[**ativarCapturaDeIntimacoesParaAutenticacao**](autenticacoesResources.md#ativarCapturaDeIntimacoesParaAutenticacao) | **PUT** /auths/{auth_id}/intimations/enable | Ativa a captura de intimações para um auth
[**desativarCapturaDeIntimacoesParaAutenticacao**](autenticacoesResources.md#desativarCapturaDeIntimacoesParaAutenticacao) | **PUT** /auths/{auth_id}/intimations/disable | Desativa a captura de intimações para um auth

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]

# **cadastrarNovaAutenticacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**auth** | [**NovaAutenticacao**](../models/auth/NovaAutenticacao.md)| parametros necessários para a criação de um novo registro | [obrigatório]

# **ativarCapturaDeIntimacoesParaAutenticacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**authId** | **int**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]
**enable_auth** | [**AtivarIntimacoesParaAutenticacao**](../models/auth/AtivarIntimacoesParaAutenticacao.md)| parametros necessários para a ativação da captura de intimações | [obrigatório]

# **desativarCapturaDeIntimacoesParaAutenticacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**authId** | **int**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\AtivarIntimacoesParaAutenticacao;
use Intimaai\Models\NovaAutenticacao;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->autenticacoesResources->consultarPorId(45217);
    dump($resultById);
    
    $newAuth = new NovaAutenticacao(1, 1);
    $resultNew = $intimaai->autenticacoesResources->cadastrarNovaAutenticacao($newAuth);

    $enableAuth = new AtivarIntimacoesParaAutenticacao(['SEM_PRAZO'], [0, 1], ['06:00']);
    $resultEnable = $intimaai->autenticacoesResources->ativarCapturaDeIntimacoesParaAutenticacao(1, $enableAuth);

    $resultDisable = $intimaai->autenticacoesResources->desativarCapturaDeIntimacoesParaAutenticacao(1);

    $paginator = $intimaai->autenticacoesResources->paginate();
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
