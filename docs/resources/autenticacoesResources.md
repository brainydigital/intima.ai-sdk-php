# Recurso: **autenticacoes**

> As autenticações são os serviços de autenticação do `Intima.ai` para os tribunais. 
> Você pode criar diversas autenticações para diversos tribunais sendo uma autenticação para cada tribunal.


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](autenticacoesResources.md#consultarPorId) | **GET** /autenticacoes/{id} | Visualiza uma autenticação
[**cadastrarNovaAutenticacao**](autenticacoesResources.md#cadastrarNovaAutenticacao) | **POST** /autenticacoes | Cadastra uma nova autenticação
[**atualizarAutenticacao**](autenticacoesResources.md#atualizarAutenticacao) | **PUT** /autenticacoes/{autenticacao_id}/atualizar | Atualiza uma autenticação
[**ativarCapturaDeIntimacoesParaAutenticacao**](autenticacoesResources.md#ativarCapturaDeIntimacoesParaAutenticacao) | **PUT** /autenticacoes/{autenticacao_id}/intimacoes/ativar | Ativa a captura de intimações para uma autenticação
[**desativarCapturaDeIntimacoesParaAutenticacao**](autenticacoesResources.md#desativarCapturaDeIntimacoesParaAutenticacao) | **PUT** /autenticacoes/{autenticacao_id}/intimacoes/desativar | Desativa a captura de intimações para uma autenticação

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->autenticacoes->consultarPorId(45217);
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

# **cadastrarNovaAutenticacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**autenticacao** | [**NovaAutenticacao**](../models/auth/NovaAutenticacao.md)| parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
#### Cadastro de autenticacao com certifiado A1
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\NovaAutenticacao;

try 
{
    $intimaai = new Intimaai('api_token');
    
    // Instânciar um novo objeto NovaAutenticacao com os seguintes parametros:
    // id do tribunal, id do certificado, null, null, numero da OAB, letra da OAB(opcional), UF da OAB 
    $autenticacao = new NovaAutenticacao(1, 1, null, null, 'numero OAB', 'letra OAB', 'UF OAB');
    $resultado = $intimaai->autenticacoes->cadastrarNovaAutenticacao($autenticacao);
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
#### Cadastro de autenticacao com login e senha
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\NovaAutenticacao;

try 
{
    $intimaai = new Intimaai('api_token');
    
    // Instânciar um novo objeto NovaAutenticacao com os seguintes parametros:
    // id do tribunal, null, login, senha, numero da OAB, letra da OAB(opcional), UF da OAB 
    $autenticacao = new NovaAutenticacao(1, null, 'login', 'senha', 'numero OAB', 'letra OAB', 'UF OAB');
    $resultado = $intimaai->autenticacoes->cadastrarNovaAutenticacao($autenticacao);
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

# **atualizarAutenticacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**autenticacaoId** | **int**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]
**atualizarAutenticacao** | [**AtualizarAutenticacao**](../models/auth/AtualizarAutenticacao.md)| parametros necessários para atualizar uma autenticação | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\AtualizarAutenticacao;

try 
{
    $intimaai = new Intimaai('api_token');

    $atualizarAutenticacao = new AtualizarAutenticacao('numero da OAB', 'letra da OAB', 'UF da OAB');
    $resultado = $intimaai->autenticacoes->atualizarAutenticacao(1, $atualizarAutenticacao);
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

# **ativarCapturaDeIntimacoesParaAutenticacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**autenticacaoId** | **int**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]
**ativarAutenticacao** | [**AtivarIntimacoesParaAutenticacao**](../models/auth/AtivarIntimacoesParaAutenticacao.md)| parametros necessários para a ativação da captura de intimações | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\AtivarIntimacoesParaAutenticacao;

try 
{
    $intimaai = new Intimaai('api_token');

    $ativarIntimacoes = new AtivarIntimacoesParaAutenticacao(['SEM_PRAZO'], [0, 1], ['06:00']);
    $resultado = $intimaai->autenticacoes->ativarCapturaDeIntimacoesParaAutenticacao(1, $ativarIntimacoes);
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

# **desativarCapturaDeIntimacoesParaAutenticacao**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**autenticacaoId** | **int**| é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->autenticacoes->desativarCapturaDeIntimacoesParaAutenticacao(1);
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
