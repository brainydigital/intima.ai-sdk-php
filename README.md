<br />
<div align="center">
  <a href="#">
    <img src="https://raw.githubusercontent.com/brainydigital/intima.ai-sdk-php/master/docs/images/logo.png" alt="Logo" width="120" height="120">
  </a>
  
  [![Packagist - Downloads](https://img.shields.io/packagist/dt/brainydigital/intima.ai-sdk-php.svg?style=flat&color=97ca00)](https://packagist.org/packages/brainydigital/intima.ai-sdk-php "View this project on packagist")
  [![Packagist - Version](https://img.shields.io/packagist/v/brainydigital/intima.ai-sdk-php.svg?style=flat&color=blue)](https://packagist.org/packages/brainydigital/intima.ai-sdk-php "View this project on packagist")
  [![Contributors](https://img.shields.io/badge/contributors-2-yellow.svg)](https://github.com/brainydigital/intima.ai-sdk-php/graphs/contributors)
  [![MIT license](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://opensource.org/licenses/MIT)
</div>

# **Intima.ai - SDK PHP**

Este repositório é a implementação da API do [Intima.ai](https://app.intima.ai) em forma de SDK Client para PHP. Este SDK cobre todas as ações disponíveis dentro da plataforma do `Intima.ai` e as disponibilizam como métodos, que podem ser integrados e utilizados por outros serviços ou aplicações, bastando somente possuir o `Token de acesso da API (api_token)`.

- Versão da API: 2.0.0

- Referência da API: [Referência completa da API](https://documenter.getpostman.com/view/11707205/T17GgoJW?version=latest)

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

Os passos necessários para começar a solicitar novas ações dentro do `Intima.ai` (solicitar cópias processuais, ativar escutas de processos, protocolar e etc) são os seguintes:

1. Importe um Certificado do tipo A1 para sua conta (você advogado pode solicitar um certificado A1 em qualquer certificadora autorizada) 
ou utilize login e senha, caso o tribunal dê suporte;

2. Crie uma Autenticação (serviço de autenticação) para cada Tribunal que você deseja executar Ações;

3. Agora é só solicitar qualquer tipo de ação que o `Intima.ai` dê suporte, seguindo as documentações específicas para cada tipo de ação.

Após seguir os passos da [instalação](#Instalação) e possuir uma autenticação válida para um Tribunal. Por exemplo, para realizar uma nova cópia processual:

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\CopiaProcessual;

try 
{
    $intimaai = new Intimaai('api_token');

    $copiaProcessual = new CopiaProcessual('00000000000000000000', 120);
    $resultado = $intimaai->copiasProcessuais->cadastrarNovaCopia($copiaProcessual);
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

## Paginando recursos

A maioria dos recursos do SDK possuem paginação, que pode ser acessada atravez da classe 
[**Paginator**](./docs/models/api/Paginator.md). A utilização da paginação de um recurso é bem simples:

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $paginacao = $intimaai->copiasProcessuais->paginar();

    $paginacao->obterPagina(1);
    $paginacao->proximaPagina();
    $paginacao->paginaAnterior();
    $paginacao->existeProximaPagina();
    $paginacao->carregarTudo();

    dump($paginacao->obterColecao());
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

Recurso | Descrição
------------ | -------------
[**autenticacoes**](docs/resources/autenticacoesResources.md#autenticacoes) | Contém todos os endpoints/métodos para as autenticações
[**tribunais**](docs/resources/tribunaisResources.md#tribunais) | Contém todos os endpoints/métodos para os tribunais
[**certificados**](docs/resources/certificadosResources.md#certificados) | Contém todos os endpoints/métodos para os seus certificados
[**intimacoes**](docs/resources/intimacoesResources.md#intimacoes) | Contém todos os endpoints/métodos para intimações capturadas
[**usuarios**](docs/resources/user/usuariosResources.md#usuarios) | Contém todos os endpoints/métodos para seu usuário
[**notificacoes**](docs/resources/user/notificacoesResources.md#notificacoes) | Contém todos os endpoints/métodos para as notificações do seu usuário
[**webhooks**](docs/resources/user/webhooksResources.md#webhooks) | Contém todos os endpoints/métodos para os webhooks do usuário
[**acoes**](docs/resources/acoesResources.md#acoes) | Contém todos os endpoints/métodos para ações realizadas no `Intima.ai`
[**copiasProcessuais**](docs/resources/copiasProcessuaisResources.md#copiasProcessuais) | Contém todos os endpoints/métodos para as cópias processuais
[**escutasProcessuais**](docs/resources/escutasProcessuaisResources.md#escutasProcessuais) | Contém todos os endpoints/métodos para as escutas processuais
[**protocolosDeHabilitacao**](docs/resources/protocolosDeHabilitacaoResources.md#protocolosDeHabilitacao) | Contém todos os endpoints/métodos para os protocolos de habilitação
[**informacoesProcessuais**](docs/resources/informacoesProcessuaisResources.md#informacoesProcessuais) | Contém todos os endpoints/métodos para as informações processuais
[**andamentosProcessuais**](docs/resources/andamentosProcessuaisResources.md#andamentosProcessuais) | Contém todos os endpoints/métodos para os andamentos processuais
[**protocolosProcessuais**](docs/resources/protocolosProcessuaisResources.md#protocolosProcessuais) | Contém todos os endpoints/métodos para os protocolos
[**consultasProcessuais**](docs/resources/consultasProcessuaisResources.md#consultasProcessuais) | Contém todos os endpoints/métodos para consultas processuais e pré-análises
[**creditos**](docs/resources/creditosResources.md#creditos) | Contém todos os endpoints/métodos para os recurso de créditos no INTIMA.AI

## Documentação para Autenticação

### API Token

- **Tipo**: API Key
- **Parametro da API**: api_token
- **Localização**: URL query string
