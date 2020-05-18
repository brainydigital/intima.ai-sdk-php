# **escutasProcessuaisResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](escutasProcessuaisResources.md#consultarPorId) | **GET** /process-listeners/{id} | Visualiza a escuta processual
[**cadastrarNovaEscuta**](escutasProcessuaisResources.md#cadastrarNovaEscuta) | **POST** /process-listeners | Cadastra uma nova escuta processual
[**capturarEscuta**](escutasProcessuaisResources.md#capturarEscuta) | **GET** /actions/process-listeners/{listener_id}/capture | Executa a escuta processual
[**cadastrarNovaEscutaECapturar**](escutasProcessuaisResources.md#cadastrarNovaEscutaECapturar) | **POST** /actions/process-listeners/create-and-capture| Cadastra e executa a escuta processual
[**consultarResultadosCapturadosDaEscuta**](escutasProcessuaisResources.md#consultarResultadosCapturadosDaEscuta) | **GET** /process-listeners/{listener_id}/results | Retorna os resultados da escuta processual
[**atualizarEscuta**](escutasProcessuaisResources.md#atualizarEscuta) | **PUT** /process-listeners/{listener_id} | Atualiza uma escuta processual
[**excluirEscuta**](escutasProcessuaisResources.md#excluirEscuta) | **DELETE** /process-listeners/{listener_id} | Exclui uma escuta processual

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]

# **cadastrarNovaEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listener** | [**EscutaProcessual**](../models/listener/EscutaProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

# **capturarEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listenerId** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]

# **cadastrarNovaEscutaECapturar**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listener** | [**Listener**](../models/listener/Listener.md) | parametros necessários para a criação de um novo registro | [obrigatório]

# **consultarResultadosCapturadosDaEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listenerId** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]

# **atualizarEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listenerId** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]
**listener** | [**AtualizarEscutaProcessual**](../models/listener/AtualizarEscutaProcessual.md) | parametros necessários para a atualizar o registro | [obrigatório]

# **excluirEscuta**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**listenerId** | **int**| é o id referente a escuta processual no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\EscutaProcessual;
use Intimaai\Models\AtualizarEscutaProcessual;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->escutasProcessuaisResources->consultarPorId(45217);
    dump($resultById);

    $resultCapture = $intimaai->escutasProcessuaisResources->capturarEscuta(45217);
    dump($resultCapture);

    $resultDelete = $intimaai->escutasProcessuaisResources->excluirEscuta(45217);
    dump($resultById);

    $listener = new EscutaProcessual('0000000-00.0000.0.00.0000', 1, ['07:00']);
    $resultNew = $intimaai->escutasProcessuaisResources->cadastrarNovaEscuta($listener);
    dump($resultNew);
    
    $listenerUpdate = new AtualizarEscutaProcessual(['07:00']);
    $resultUpdate = $intimaai->escutasProcessuaisResources->atualizarEscuta(31, $listenerUpdate);
    dump($resultUpdate);

    $paginatorResults = $intimaai->escutasProcessuaisResources->consultarResultadosCapturadosDaEscuta(31);
    $paginatorResults->getPage(1);

    $paginator = $intimaai->escutasProcessuaisResources->paginate();
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