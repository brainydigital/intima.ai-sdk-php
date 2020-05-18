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

# **Intima.ai - SDK PHP**

Este repositório é a implementação da API do [Intima.ai](https://app.intima.ai) em forma de SDK Client para PHP. Este SDK cobre todas as ações disponíveis dentro da plataforma do `Intima.ai` e as disponibilizam como métodos, que podem ser integrados e utilizados por outros serviços ou aplicações, bastando somente possuir o `Token de acesso da API (api_token)`.

- Versão da API: 2.0.0

- Documentação da API: [API de Integração](https://documenter.getpostman.com/view/2116715/SzmmVuso?version=latest)

## Requerimentos

PHP >= 5.5

## **Instalação**
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

Após seguir os passos da [instalação](#Instalação):

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\CopiaProcessual;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $copyById = $intimaai->copiasProcessuaisResources->consultarPorId(45217);
    dump($copyById);

    $copy = new CopiaProcessual('00000000000000000000', 120);
    $newCopy = $intimaai->copiasProcessuaisResources->cadastrarNovaCopia($copy);
    dump($newCopy);

    $paginator = $intimaai->copiasProcessuaisResources->paginate();
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
[**autenticacoesResources**](docs/resources/autenticacoesResources.md#autenticacoesResources) | Contém todos os endpoints/métodos para os auths
[**tribunaisResources**](docs/resources/tribunaisResources.md#tribunaisResources) | Contém todos os endpoints/métodos para os tribunais
[**certificadosResources**](docs/resources/certificadosResources.md#certificadosResources) | Contém todos os endpoints/métodos para os seus certificados
[**intimacoesResources**](docs/resources/intimacoesResources.md#intimacoesResources) | Contém todos os endpoints/métodos para intimações capturadas
[**usuariosResources**](docs/resources/user/usuariosResources.md#usuariosResources) | Contém todos os endpoints/métodos para seu usuário
[**notificacoesResources**](docs/resources/user/notificacoesResources.md#notificacoesResources) | Contém todos os endpoints/métodos para seu os dependentes do usuário (que irão receber notificações)
[**webhooksResources**](docs/resources/user/webhooksResources.md#webhooksResources) | Contém todos os endpoints/métodos para os webhooks do usuário
[**acoesResources**](docs/resources/acoesResources.md#acoesResources) | Contém todos os endpoints/métodos para ações
[**copiasProcessuaisResources**](docs/resources/copiasProcessuaisResources.md#copiasProcessuaisResources) | Contém todos os endpoints/métodos para as cópias processuais
[**escutasProcessuaisResources**](docs/resources/escutasProcessuaisResources.md#escutasProcessuaisResources) | Contém todos os endpoints/métodos para as escutas processuais
[**protocolosDeHabilitacaoResources**](docs/resources/protocolosDeHabilitacaoResources.md#protocolosDeHabilitacaoResources) | Contém todos os endpoints/métodos para os protocolos de habilitação
[**informacoesProcessuaisResources**](docs/resources/informacoesProcessuaisResources.md#informacoesProcessuaisResources) | Contém todos os endpoints/métodos para as informações processuais
[**andamentosProcessuaisResources**](docs/resources/andamentosProcessuaisResources.md#andamentosProcessuaisResources) | Contém todos os endpoints/métodos para os andamentos processuais
[**protocolosProcessuaisResources**](docs/resources/protocolosProcessuaisResources.md#protocolosProcessuaisResources) | Contém todos os endpoints/métodos para os protocolos
[**consultasProcessuaisResources**](docs/resources/consultasProcessuaisResources.md#consultasProcessuaisResources) | Contém todos os endpoints/métodos para consultas processuais e pré-análises


## Documentação para Autenticação

### ApiKeyAuth

- **Tipo**: API Key
- **Parametro da API**: api_token
- **Localização**: URL query string
