# Recurso: **consultasProcessuais**

> Com este recurso você poderá realizar consultas de todos os processos disponíveis em qualquer 
>tribunal do Brasil. Bastando apenas informar o `numero do proceso` ou o `nome da parte` ou o `nome do 
>representante`.
>
> O `Intima.ai` recomenda que antes de realizar qualquer consulta processual, primeiro solicite 
>a `pré-analise da consulta processual`, pois dependendo dos termos utilizados na consulta processual, 
>poderá haver um numero muito alto de registros encontrados, consumindo assim seus créditos.
>
> A `pré-analise de uma consulta processual` retorna a quantidade de registros encontrados com os 
>termos de busca informados.


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Método | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](consultasProcessuaisResources.md#consultarPorId) | **GET** /consultas-processuais/{id} | Visualiza uma consulta processual
[**cadastrarNovaConsulta**](consultasProcessuaisResources.md#cadastrarNovaConsulta) | **POST** /acoes/consultas-processuais | Cadastra uma nova consulta processual
[**consultarResultadosDaConsulta**](consultasProcessuaisResources.md#consultarResultadosDaConsulta) | **GET** /consultas-processuais/{consulta_id}/resultados | Retorna um [**Paginator**](../models/api/Paginator.md) com os processos capturados
[**listarPreAnalisesDeConsultas**](consultasProcessuaisResources.md#listarPreAnalisesDeConsultas) | **GET** /consultas-processuais/consultas-analises | Retorna um [**Paginator**](../models/api/Paginator.md) com as pré-análises previamente realizadas para as consultas processuais
[**consultarPorIdPreAnaliseDeConsulta**](consultasProcessuaisResources.md#consultarPorIdPreAnaliseDeConsulta) | **GET** /consultas-processuais/consultas-analises/{id} | Visualiza uma pré-análise que foi realizada para uma determinada consulta processual
[**cadastrarPreAnaliseDeConsulta**](consultasProcessuaisResources.md#cadastrarPreAnaliseDeConsulta) | **POST** /acoes/consultas-processuais/consultas-analises | Cadastra uma nova pré-análise para uma determinada consulta processual

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente a consulta processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->consultasProcessuais->consultarPorId(45217);
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

# **cadastrarNovaConsulta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**consultaProcessual** | [**ConsultaProcessual**](../models/process_search/ConsultaProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
#### Cadastrar Nova Consulta Com Número do Processo
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\ConsultaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $consulta = new ConsultaProcessual(1, '0000000-00.0000.0.00.0000');
    $resultado = $intimaai->consultasProcessuais->cadastrarNovaConsulta($consulta);
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
#### Cadastrar Nova Consulta Com Número do Processo e Nome da Parte
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\ConsultaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $consulta = new ConsultaProcessual(1, '0000000-00.0000.0.00.0000', 'Nome da Parte');
    $resultado = $intimaai->consultasProcessuais->cadastrarNovaConsulta($consulta);
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
#### Cadastrar Nova Consulta Com Número do Processo, Nome da Parte, Nome do representante e numero da OAB
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\ConsultaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $consulta = new ConsultaProcessual(1, '0000000-00.0000.0.00.0000', 'Nome da Parte', 'Nome do Representante', 'Numero OAB');
    $resultado = $intimaai->consultasProcessuais->cadastrarNovaConsulta($consulta);
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
# **consultarResultadosDaConsulta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**consultaProcessualId** | **int**| é o id referente a consulta processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultados = $intimaai->consultasProcessuais->consultarResultadosDaConsulta(31);
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

# **listarPreAnalisesDeConsultas**

### Parametros

Este método não possui parametros

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultados = $intimaai->consultasProcessuais->listarPreAnalisesDeConsultas();
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

# **consultarPorIdPreAnaliseDeConsulta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente a consulta processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultados = $intimaai->consultasProcessuais->consultarPorIdPreAnaliseDeConsulta(1);
    dump($resultados);
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

# **cadastrarPreAnaliseDeConsulta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**preAnaliseDeConsultaProcessual** | [**PreAnaliseDeConsultaProcessual**](../models/process_search/PreAnaliseDeConsultaProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
#### Pré Análise Com Número de Processo
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\PreAnaliseDeConsultaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $consultaAnalise = new PreAnaliseDeConsultaProcessual(1, '0000000-00.0000.0.00.0000');
    $resultado = $intimaai->consultasProcessuais->cadastrarPreAnaliseDeConsulta($consultaAnalise);
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
#### Pré Análise Com Número de Processo e Nome da Parte
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\PreAnaliseDeConsultaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $consultaAnalise = new PreAnaliseDeConsultaProcessual(1, '0000000-00.0000.0.00.0000', 'Nome da Parte');
    $resultado = $intimaai->consultasProcessuais->cadastrarPreAnaliseDeConsulta($consultaAnalise);
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
#### Pré Análise Com Número de Processo, Nome da Parte e Nome do Representante
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\PreAnaliseDeConsultaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $consultaAnalise = new PreAnaliseDeConsultaProcessual(1, '0000000-00.0000.0.00.0000', 'Nome da Parte', 'Nome do Representante');
    $resultado = $intimaai->consultasProcessuais->cadastrarPreAnaliseDeConsulta($consultaAnalise);
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
