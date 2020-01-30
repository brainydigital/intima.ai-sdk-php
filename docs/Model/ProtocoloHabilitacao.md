# ProtocoloHabilitacao

## Propriedades
Nome | Tipo | Descrição | Notas
------------ | ------------- | ------------- | -------------
**numero_processo** | **string** | é o numero do processo no qual se deseja realizar o protocolo de habilitação | [obrigatório] 
**tipo_documento_mensagem_geral** | **int** | é o tipo do documento geral | [obrigatório] 
**documentos** | [**Documento[]**](../Model/Documento.md) | são os documentos anexados | [opcional] 
**mensagem_geral** | **string** | é a mensagem geral do protocolo de habilitação | [opcional] 
**descricao** | **string** | é a descrição do protocolo de habilitação | [opcional] 
**tipo_solicitacao** | **int** | é o tipo de solicitação do protocolo de habilitação (0) | [obrigatório] 
**tipo_declaracao** | **int** | é o tipo de declaração do protocolo de habilitação (0 ou 1)  | [obrigatório] 
**polo** | **int** | é o polo selecionado do protocolo de habilitação (0 ou 1)  | [obrigatório] 
**partes_vinculadas** | **array** | são as partes vinculadas ao protocolo de habilitação | [obrigatório] 

[[Voltar para a lista de Models]](../../README.md#documentation-for-models) [[Voltar para lista da API]](../../README.md#documentation-for-api-endpoints) [[Voltar para o README]](../../README.md)

