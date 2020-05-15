# ProtocoloProcessual

## Propriedades
Nome | Tipo | Descrição | Notas
------------ | ------------- | ------------- | -------------
**auth_id** | **int** | é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório] 
**process_number** | **string** | é o numero do processo no qual se deseja realizar o protocolo | [obrigatório] 
**tipo_documento_mensagem_geral** | **int** | é o tipo do documento geral | [obrigatório] 
**descricao** | **string** | é a descrição do protocolo de habilitação | [opcional] 
**mensagem_geral** | **string** | é a mensagem geral do protocolo de habilitação | [opcional] 
**peticao** | [**Peticao**](../protocol/Peticao.md) | é a petição que se deseja anexar | [opcional] 
**documentos** | [**Document[]**](../Document.md) | são os documentos anexados | [opcional] 

[[Voltar a lista da API]](../../../README.md#Documentação-para-os-Endpoints-da-API)    
[[Voltar para o README]](../../../README.md#Intima.ai---SDK-PHP)
