# **certificateResource**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**getById**](certificateResource.md#getById) | **GET** /certificates/{id} | Visualiza um certificado
[**getNewCertificate**](certificateResource.md#getNewCertificate) | **POST** /certificates | Cadastra um novo certificado
[**updateCertificate**](certificateResource.md#updateCertificate) | **POST** /certificates/{certificate_id} | Atualiza um certificado
[**deleteCertificate**](certificateResource.md#deleteCertificate) | **DELETE** /certificates/{certificate_id} | Exclui um certificado

# **getById**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **number**| é o id referente ao certificado cadastrado no Intima.ai | [obrigatório]

# **getNewCertificate**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**certificate** | **NewCertificate**| parametros necessários para a criação de um novo registro | [obrigatório]

# **updateCertificate**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**certificateId** | **number**| é o id referente ao certificado cadastrado no Intima.ai | [obrigatório]
**certificate** | **UpdateCertificate**| parametros necessários para a atualização do registro | [obrigatório]

# **deleteCertificate**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**certificateId** | **number**| é o id referente ao certificado cadastrado no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $result = $intimaai->certificateResource->getById(45217);
    dump($result);

    $paginator = $intimaai->certificateResource->paginate();
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
