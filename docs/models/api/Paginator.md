# **Paginator**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Descrição
------------- | -------------
[**getPage**](Paginator.md#getPage) | Retorna um **Paginator** com todos os resultados do resource da página escolhida
[**nextPage**](Paginator.md#nextPage) | Retorna um **Paginator** com todos os resultados do resource, da página atual + 1
[**previousPage**](Paginator.md#previousPage) | Retorna um **Paginator** com todos os resultados do resource, da página atual - 1
[**hasNextPage**](Paginator.md#hasNextPage) | Retorna um **boolean** que indica se a proxima página existe
[**getCollection**](Paginator.md#getCollection) | Retorna um **Array** com uma coleção de objetos
[**loadAll**](Paginator.md#loadAll) | Retorna um **Paginator** com todos os resultados do resource escolhido. Tenha cuidado ao utilizar este método, pois sua conta poderá ser bloqueda temporariamente, devido ao grande numero de requisições sequenciais

# **getPage**

### Parametros

Nome | Tipo | Descrição
------------- | ------------- | -------------
**page** | **int**| é o numero da página

# **nextPage**

### Parametros

Este método não possui parametros

# **previousPage**

### Parametros

Este método não possui parametros

# **hasNextPage**

### Parametros

Este método não possui parametros

# **getCollection**

### Parametros

Este método não possui parametros

# **loadAll**

### Parametros

Este método não possui parametros


[[Voltar a lista da API]](../../../README.md#Documentação-para-os-Endpoints-da-API)    
[[Voltar para o README]](../../../README.md#Intima.ai---SDK-PHP)