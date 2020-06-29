# **andamentosProcessuais**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](andamentosProcessuaisResources.md#consultarPorId) | **GET** /andamentos-processuais/{id} | Visualiza um andamento processual
[**cadastrarNovoAndamento**](andamentosProcessuaisResources.md#cadastrarNovoAndamento) | **POST** /andamentos-processuais | Cadastra um novo andamento processual
[**capturarAndamentos**](andamentosProcessuaisResources.md#capturarAndamentos) | **GET** /acoes/andamentos-processuais/{andamento_id}/capturar | Captura os andamentos processuais de um andamento processual previamente cadastrado no Intima.ai
[**cadastrarNovoAndamentoECapturarAndamentos**](andamentosProcessuaisResources.md#cadastrarNovoAndamentoECapturarAndamentos) | **POST** /acoes/andamentos-processuais/criar-e-capturar | Cadastra e captura os andamento processuais no Intima.ai
[**consultarResultadosDoAndamento**](andamentosProcessuaisResources.md#consultarResultadosDoAndamento) | **GET** /andamentos-processuais/{andamento_id}/resultados | Retorna um *Paginator* com os andamento processuais capturados
[**excluirAndamento**](andamentosProcessuaisResources.md#excluirAndamento) | **DELETE** /andamentos-processuais/{andamento_id} | Exclui um andamento processual

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->andamentosProcessuais->consultarPorId(45217);
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

# **cadastrarNovoAndamento**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**andamentoProcessual** | [**AndamentoProcessual**](../models/process_course/AndamentoProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\AndamentoProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $andamento = new AndamentoProcessual('0000000-00.0000.0.00.0000', 120);
    $resultado = $intimaai->andamentosProcessuais->cadastrarNovoAndamento($andamento);
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

# **capturarAndamentos**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**andamentoProcessualId** | **int**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->andamentosProcessuais->capturarAndamentos(12);
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

# **cadastrarNovoAndamentoECapturarAndamentos**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**andamentoProcessual** | [**AndamentoProcessual**](../models/process_course/AndamentoProcessual.md) | parametros necessários para a criação e captura de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\AndamentoProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $andamento = new AndamentoProcessual('0000000-00.0000.0.00.0000', 120);
    $resultado = $intimaai->andamentosProcessuais->cadastrarNovoAndamentoECapturarAndamentos($andamento);
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

# **consultarResultadosDoAndamento**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**andamentoProcessualId** | **int**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultados = $intimaai->andamentosProcessuais->consultarResultadosDoAndamento(21);
    $resultados->obterPagina(1);

    dump($resultados->obterColecao());
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

# **excluirAndamento**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**andamentoProcessualId** | **int**| é o id referente ao andamento processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\AndamentoProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->andamentosProcessuais->excluirAndamento(12);
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
