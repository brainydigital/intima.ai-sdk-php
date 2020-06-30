# SegundaEtapaParaProtocoloDeHabilitacao

## Propriedades
Nome | Tipo | Descrição | Notas
------------ | ------------- | ------------- | -------------
**tipoSolicitacao** | **int** | é o tipo de solicitação do protocolo de habilitação (0 (Habilitação Simples)) | [obrigatório] 
**tipoDeclaracao** | **int** | é o tipo de declaração do protocolo de habilitação (0 (Declaração sob pena de lei) ou 1 (Declaração pela apresentação oportuna do instrumento de mandato))  | [obrigatório] 
**polo** | **number** | é o polo selecionado do protocolo de habilitação (0 (Polo Ativo) ou 1 (Polo Passivo))  | [obrigatório] 
**partesVinculadas** | **string[]** | são as partes vinculadas ao protocolo de habilitação | [obrigatório] 
**tipoDocumentoMensagemGeral** | **int** | é o tipo do documento geral | [obrigatório] 
**descricao** | **string** | é a descrição do protocolo de habilitação | [opcional] 
**mensagemGeral** | **string** | é a mensagem geral do protocolo de habilitação | [opcional] 
**documentos** | [**Documento[]**](../Documento.md) | são os documentos anexados | [opcional] 

[[Voltar a lista da API]](../../../README.md#Documentação-para-os-Endpoints-da-API)    
[[Voltar para o README]](../../../README.md#Intima.ai---SDK-PHP)

