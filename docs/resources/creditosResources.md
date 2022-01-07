# Recurso: **creditos**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Método | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarCotacaoDeCreditosDasAcoes**](creditosResources.md#consultarCotacaoDeCreditosDasAcoes) | **GET** /creditos/cotacao-acoes | Consulta a cotação atual dos créditos para cada tipo de ação
[**consultarSaldoEmCreditos**](creditosResources.md#consultarSaldoEmCreditos) | **GET** /creditos/saldo | Consulta seu saldo atual em créditos
[**consultarHistoricoDeUsoDeCreditos**](creditosResources.md#consultarHistoricoDeUsoDeCreditos) | **GET** /creditos/historico-de-uso | Consulta o histórico de uso de dos seus créditos

# **consultarCotacaoDeCreditosDasAcoes**

### Parametros

Este método não possui parametros

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->creditos->consultarCotacaoDeCreditosDasAcoes();
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

# **consultarSaldoEmCreditos**

### Parametros

Este método não possui parametros

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

    $resultado = $intimaai->creditos->consultarSaldoEmCreditos();
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

# **consultarHistoricoDeUsoDeCreditos**

### Parametros

Este método não possui parametros

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
    
    $resultados = $intimaai->creditos->consultarHistoricoDeUsoDeCreditos();
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

[[Voltar ao topo]](#)        
[[Voltar a lista da API]](../../README.md#Documentação-para-os-Endpoints-da-API)    
[[Voltar para o README]](../../README.md#Intima.ai---SDK-PHP)
