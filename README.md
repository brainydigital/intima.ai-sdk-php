<br />
<div align="center">
  <a href="#">
    <img src="docs/images/logo.png" alt="Logo" width="120" height="120">
  </a>
  
  [![Packagist - Downloads](https://img.shields.io/packagist/dt/brainydigital/intimai-sdk-php.svg?style=flat&color=97ca00)](https://packagist.org/packages/brainydigital/intimai-sdk-php "View this project on packagist")
  [![Packagist - Version](https://img.shields.io/packagist/v/brainydigital/intimai-sdk-php.svg?style=flat&color=blue)](https://packagist.org/packages/brainydigital/intimai-sdk-php "View this project on packagist")
  [![Contributors](https://img.shields.io/badge/contributors-1-yellow.svg)](https://github.com/brainydigital/intimai-sdk-php/graphs/contributors)
  [![MIT license](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://opensource.org/licenses/MIT)
</div>

# Intima.ai - SDK PHP

Este repositório é a implementação da API do [Intima.ai](https://app.intima.ai) em forma de SDK Client para PHP. Este SDK cobre todas as ações disponíveis dentro da plataforma do `Intima.ai` e as disponibilizam como métodos, que podem ser integrados e utilizados por outros serviços ou aplicações, bastando somente possuir o `Token de acesso da API (api_token)`.

- Versão da API: 1.0.0

## Requerimentos

PHP >= 5.5

## Instalação & Utilização
### Composer

Para instalar via [Composer](http://getcomposer.org/), faça o seguinte:

```
composer require brainydigital/intimai-sdk-php
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

// Configure API key authorization: ApiKeyAuth (api_token)
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('api_token', 'YOUR_API_KEY');

$apiInstance = new Swagger\Client\Api\AcoesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$pje_action_id = 56; // int | é fornecido após se realizar a requisição de qualquer ação para o Intima.ai

try {
    $apiInstance->getActionStatus($pje_action_id);
} catch (Exception $e) {
    echo 'Exception when calling AcoesApi->getActionStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentação para os Endpoints da API

Todas as URIs são relativas a *https://app.intima.ai/api*

Classe | Metodo | Requisição HTTP | Descrição
------------ | ------------- | ------------- | -------------
*AcoesApi* | [**getActionStatus**](docs/Api/AcoesApi.md#getactionstatus) | **GET** /actions/status/{pje_action_id} | Checa o resultado de uma ação
*CopiasApi* | [**createProcessCopy**](docs/Api/CopiasApi.md#createprocesscopy) | **POST** /actions/processos/copy/{pje_auth_id} | Realiza uma nova cópia processual
*EscutasApi* | [**createProcessEscuta**](docs/Api/EscutasApi.md#createprocessescuta) | **POST** /actions/process-docs/{pje_auth_id} | Realiza uma nova escuta processual
*IntimacoesApi* | [**getAllIntimacoes**](docs/Api/IntimacoesApi.md#getallintimacoes) | **GET** /intimacoes | Visualiza todas as intimações capturadas
*ProtocolosApi* | [**createProcessProtocolo**](docs/Api/ProtocolosApi.md#createprocessprotocolo) | **POST** /actions/process-protoco/{pje_auth_id} | Realiza um novo protocolo

## Documentação para os Models

 - [Documento](docs/Model/Documento.md)

## Documentação para Autenticação


## ApiKeyAuth

- **Tipo**: API Key
- **Parametro da API**: api_token
- **Localização**: URL query string
