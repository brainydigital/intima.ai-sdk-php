# **certificadosResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](certificadosResources.md#consultarPorId) | **GET** /certificates/{id} | Visualiza um certificado
[**cadastrarNovoCertificado**](certificadosResources.md#cadastrarNovoCertificado) | **POST** /certificates | Cadastra um novo certificado
[**atualizarCertificado**](certificadosResources.md#atualizarCertificado) | **POST** /certificates/{certificate_id} | Atualiza um certificado
[**excluirCertificado**](certificadosResources.md#excluirCertificado) | **DELETE** /certificates/{certificate_id} | Exclui um certificado

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao certificado cadastrado no Intima.ai | [obrigatório]

# **cadastrarNovoCertificado**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**certificate** | [**Certificado**](../models/certificate/Certificado.md)| parametros necessários para a criação de um novo registro | [obrigatório]

# **atualizarCertificado**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**certificateId** | **int**| é o id referente ao certificado cadastrado no Intima.ai | [obrigatório]
**certificate** | [**Certificado**](../models/certificate/Certificado.md)| parametros necessários para a atualização do registro | [obrigatório]

# **excluirCertificado**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**certificateId** | **int**| é o id referente ao certificado cadastrado no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\Certificado;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->certificadosResources->consultarPorId(45217);
    dump($resultById);
    
    $newCert = new Certificado('/path/to/file.pfx', '12345678');
    $resultNew = $intimaai->certificadosResources->cadastrarNovoCertificado($newCert);
    dump($resultNew);

    $resultDelete = $intimaai->certificadosResources->excluirCertificado(1);
    dump($resultDelete);

    $paginator = $intimaai->certificadosResources->paginate();
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
