# ProtocoloProcessual

## Propriedades
Nome | Tipo | Descrição | Notas
------------ | ------------- | ------------- | -------------
**autenticacaoId** | **int** | é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório] 
**numeroProcesso** | **string** | é o numero do processo no qual se deseja realizar o protocolo | [obrigatório] 
**tipoDocumentoMensagemGeral** | **int** | é o tipo do documento geral | [obrigatório] 
**descricao** | **string** | é a descrição do protocolo de habilitação | [opcional] 
**mensagemGeral** | **string** | é a mensagem geral do protocolo de habilitação | [opcional] 
**peticao** | [**Peticao**](../protocol/Peticao.md) | é a petição que se deseja anexar | [opcional] 
**documentos** | [**Documento[]**](../Documento.md) | são os documentos anexados | [opcional] 

[[Voltar a lista da API]](../../../README.md#Documentação-para-os-Endpoints-da-API)    
[[Voltar para o README]](../../../README.md#Intima.ai---SDK-PHP)
