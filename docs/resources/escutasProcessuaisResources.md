# Recurso: **escutasProcessuais**

> Com a escuta processual você pode saber todas as movimentações que ocorreram em um processo, 
>e baixar todos os novos documentos anexados ao processo. Para realizar uma escuta processual 
>é bastante simples, bastando somente informar o numero do processo, tribunal e os horários que 
>deseja realizar a escuta processual.


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](escutasProcessuaisResources.md#consultarPorId) | **GET** /escutas-processuais/{id} | Visualiza a escuta processual
[**cadastrarNovaEscuta**](escutasProcessuaisResources.md#cadastrarNovaEscuta) | **POST** /escutas-processuais | Cadastra uma nova escuta processual
[**capturarEscuta**](escutasProcessuaisResources.md#capturarEscuta) | **GET** /acoes/escutas-processuais/{escuta_id}/capturar | Executa a escuta processual
[**cadastrarNovaEscutaECapturar**](escutasProcessuaisResources.md#cadastrarNovaEscutaECapturar) | **POST** /acoes/escutas-processuais/criar-e-capturar| Cadastra e executa a escuta processual
[**consultarResultadosCapturadosDaEscuta**](escutasProcessuaisResources.md#consultarResultadosCapturadosDaEscuta) | **GET** /escutas-processuais/{escuta_id}/resultados | Retorna os resultados da escuta processual
[**atualizarEscuta**](escutasProcessuaisResources.md#atualizarEscuta) | **PUT** /escutas-processuais/{escuta_id} | Atualiza uma escuta processual
[**excluirEscuta**](escutasProcessuaisResources.md#excluirEscuta) | **DELETE** /escutas-processuais/{escuta_id} | Exclui uma escuta processual

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->escutasProcessuais->consultarPorId(45217);
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

# **cadastrarNovaEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**escutaProcessual** | [**EscutaProcessual**](../models/listener/EscutaProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\EscutaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $escuta = new EscutaProcessual('0000000-00.0000.0.00.0000', 1, ['07:00']);
    $resultado = $intimaai->escutasProcessuais->cadastrarNovaEscuta($escuta);
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

# **capturarEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**escutaProcessualId** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->escutasProcessuais->capturarEscuta(45217);
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

# **cadastrarNovaEscutaECapturar**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**escutaProcessual** | [**Listener**](../models/listener/Listener.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\EscutaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $escuta = new EscutaProcessual('0000000-00.0000.0.00.0000', 1, ['07:00']);
    $resultados = $intimaai->escutasProcessuais->cadastrarNovaEscutaECapturar($escuta);
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

# **consultarResultadosCapturadosDaEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**escutaProcessualId** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultados = $intimaai->escutasProcessuais->consultarResultadosCapturadosDaEscuta(31);
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

# **atualizarEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**escutaProcessualId** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]
**escutaProcessual** | [**AtualizarEscutaProcessual**](../models/listener/AtualizarEscutaProcessual.md) | parametros necessários para a atualizar o registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\AtualizarEscutaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');
    
    $escuta = new AtualizarEscutaProcessual(['07:00']);
    $resultado = $intimaai->escutasProcessuais->atualizarEscuta(31, $escuta);
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

# **excluirEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**escutaProcessualId** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->escutasProcessuais->excluirEscuta(45217);
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
