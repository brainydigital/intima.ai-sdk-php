# **informacoesProcessuaisResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](informacoesProcessuaisResources.md#consultarPorId) | **GET** /process-infos/{id} | Visualiza as informações processuais por id
[**capturarNovaInformacaoProcessual**](informacoesProcessuaisResources.md#capturarNovaInformacaoProcessual) | **POST** /actions/process-infos | Cadastra uma nova captura de informações processuais de um processo

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente as informações processuais capturadas no Intima.ai | [obrigatório]

# **capturarNovaInformacaoProcessual**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**process** | [**InformacaoProcessual**](../models/process_info/InformacaoProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\InformacaoProcessual;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->informacoesProcessuaisResources->consultarPorId(45217);
    dump($resultById);
    
    $process = new InformacaoProcessual('00000000000000000000', 120);
    $resultNew = $intimaai->informacoesProcessuaisResources->capturarNovaInformacaoProcessual($process);
    dump($resultNew);

    $paginator = $intimaai->informacoesProcessuaisResources->paginate();
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
