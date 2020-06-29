# **certificados**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](certificadosResources.md#consultarPorId) | **GET** /certificados/{id} | Visualiza um certificado
[**cadastrarNovoCertificado**](certificadosResources.md#cadastrarNovoCertificado) | **POST** /certificados | Cadastra um novo certificado
[**atualizarCertificado**](certificadosResources.md#atualizarCertificado) | **POST** /certificados/{certificado_id} | Atualiza um certificado
[**excluirCertificado**](certificadosResources.md#excluirCertificado) | **DELETE** /certificados/{certificado_id} | Exclui um certificado

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao certificado cadastrado no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->certificados->consultarPorId(45217);
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

# **cadastrarNovoCertificado**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**certificado** | [**Certificado**](../models/certificate/Certificado.md)| parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\Certificado;

try 
{
    $intimaai = new Intimaai('api_token');

    $certificado = new Certificado('/path/to/file.pfx', '12345678');
    $resultado = $intimaai->certificados->cadastrarNovoCertificado($certificado);

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

# **atualizarCertificado**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**certificadoId** | **int**| é o id referente ao certificado cadastrado no Intima.ai | [obrigatório]
**certificado** | [**Certificado**](../models/certificate/Certificado.md)| parametros necessários para a atualização do registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\Certificado;

try 
{
    $intimaai = new Intimaai('api_token');
    
    $certificado = new Certificado('/path/to/file.pfx', '12345678');
    $resultado = $intimaai->certificados->atualizarCertificado(1, $certificado);
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

# **excluirCertificado**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**certificadoId** | **int**| é o id referente ao certificado cadastrado no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->certificados->excluirCertificado(1);
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
