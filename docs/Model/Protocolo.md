# Protocolo

## Propriedades
Nome | Tipo | Descrição | Notas
------------ | ------------- | ------------- | -------------
**numero_processo** | **string** | é o numero do processo no qual se deseja realizar o protocolo | [obrigatório] 
**tipo_documento_mensagem_geral** | **int** | é o tipo do documento geral | [obrigatório, caso se informe a peticao, é opcional] 
**documentos** | [**Documento[]**](../Model/Documento.md) | são os documentos anexados | [opcional] 
**mensagem_geral** | **string** | é a mensagem geral do protocolo | [opcional] 
**descricao** | **string** | é a descrição do protocolo | [opcional] 
**peticao** | [**Peticao**](../Model/Peticao.md) | parametro exclusivo para PJe's Trabalhistas (TRT's), representa a petição quando se seleciona 'NÃO' para o 'editor do sistema' do PJe Trabalhista | [opcional] 

[[Voltar para a lista de Models]](../../README.md#documentation-for-models) [[Voltar para lista da API]](../../README.md#documentation-for-api-endpoints) [[Voltar para o README]](../../README.md)

