<br />
<div align="center">
  <a href="#">
    <img src="https://raw.githubusercontent.com/brainydigital/intima.ai-sdk-php/master/docs/images/logo.png" alt="Logo" width="120" height="120">
  </a>
  
  [![Packagist - Downloads](https://img.shields.io/packagist/dt/brainydigital/intima.ai-sdk-php.svg?style=flat&color=97ca00)](https://packagist.org/packages/brainydigital/intima.ai-sdk-php "View this project on packagist")
  [![Packagist - Version](https://img.shields.io/packagist/v/brainydigital/intima.ai-sdk-php.svg?style=flat&color=blue)](https://packagist.org/packages/brainydigital/intima.ai-sdk-php "View this project on packagist")
  [![Contributors](https://img.shields.io/badge/contributors-1-yellow.svg)](https://github.com/brainydigital/intima.ai-sdk-php/graphs/contributors)
  [![MIT license](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://opensource.org/licenses/MIT)
</div>

# Intima.ai - SDK PHP

Este repositório é a implementação da API do [Intima.ai](https://app.intima.ai) em forma de SDK Client para PHP. Este SDK cobre todas as ações disponíveis dentro da plataforma do `Intima.ai` e as disponibilizam como métodos, que podem ser integrados e utilizados por outros serviços ou aplicações, bastando somente possuir o `Token de acesso da API (api_token)`.

- Versão da API: 2.0.0

## Requerimentos

PHP >= 5.5

## Instalação & Utilização
### Composer

Para instalar via [Composer](http://getcomposer.org/), faça o seguinte:

```
composer require brainydigital/intima.ai-sdk-php
```

E execute o comando `composer install`

### Instalação Manual

Baixe os arquivos e dê o include do `autoload.php`:

```php
    require_once('/path/to/vendor/autoload.php');
```

## Começando

Após seguir os passos da [instalação](#installation--usage):

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Resources\ProcessCopy\Copy;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $copy = $intimaai->copyResource->getById(45217);
    dump($copy);

    $newCopy = $intimaai->copyResource->getNewCopy(new Copy('00000000000000000000', 120));
    dump($newCopy);

    $paginator = $intimaai->copyResource->paginate();
    $paginator->getPage(1);
    //$paginator->nextPage();
    //$paginator->previousPage();
    //$paginator->hasNextPage();
    //$paginator->loadAll();
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

## **Documentação para os Endpoints da API**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Resource | Descrição
------------ | -------------
[**authResource**](docs/resources/authResource.md#authResource) | Contém todos os endpoints/métodos para os auths
[**tribunalResource**](docs/resources/tribunalResource.md#tribunalResource) | Contém todos os endpoints/métodos para os tribunais
[**certificateResource**](docs/resources/certificateResource.md#certificateResource) | Contém todos os endpoints/métodos para os seus certificados
[**userResource**](docs/resources/user/userResource.md#userResource) | Contém todos os endpoints/métodos para seu usuário
[**userDependentResource**](docs/resources/user/userDependentResource.md#userDependentResource) | Contém todos os endpoints/métodos para seu os dependentes do usuário (que irão receber notificações)
[**userWebhookResource**](docs/resources/user/userWebhookResource.md#userWebhookResource) | Contém todos os endpoints/métodos para os webhooks do usuário
[**actionResource**](docs/resources/actionResource.md#actionResource) | Contém todos os endpoints/métodos para ações
[**qualificationProtocolResource**](docs/resources/qualificationProtocolResource.md#qualificationProtocolResource) | Contém todos os endpoints/métodos para os protocolos de habilitação
[**processInfoResource**](docs/resources/processInfoResource.md#processInfoResource) | Contém todos os endpoints/métodos para as informações processuais
[**processCourseResource**](docs/resources/processCourseResource.md#processCourseResource) | Contém todos os endpoints/métodos para os andamentos processuais
[**processSearchResource**](docs/resources/processSearchResource.md#processSearchResource) | Contém todos os endpoints/métodos para consultas processuais e pré-análises
[**copyResource**](docs/resources/copyResource.md#copyResource) | Contém todos os endpoints/métodos para as cópias processuais
[**listenerResource**](docs/resources/listenerResource.md#listenerResource) | Contém todos os endpoints/métodos para as escutas processuais
[**intimationResource**](docs/resources/intimationResource.md#intimationResource) | Contém todos os endpoints/métodos para intimações capturadas
[**processProtocolResource**](docs/resources/processProtocolResource.md#processProtocolResource) | Contém todos os endpoints/métodos para os protocolos

<!--
## Documentação para os Models

 - [Documento](docs/Model/Documento.md)
 - [Peticao](docs/Model/Peticao.md)
 - [Protocolo](docs/Model/Protocolo.md)
 - [ProtocoloHabilitacao](docs/Model/ProtocoloHabilitacao.md)
-->

## Documentação para Autenticação


### ApiKeyAuth

- **Tipo**: API Key
- **Parametro da API**: api_token
- **Localização**: URL query string
