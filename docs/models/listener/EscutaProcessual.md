# EscutaProcessual

## Propriedades
Nome | Tipo | Descrição | Notas
------------ | ------------- | ------------- | -------------
**numeroProcesso** | **string** | é o numero do processo no qual se deseja realizar a cópia | [obrigatório] 
**autenticacaoId** | **int** | é o id referente ao tribunal cadastrado em "Tribunais ativos" no Intima.ai | [obrigatório] 
**diasDeCaptura** | **int[]** | são os dias em que as consultas serão realizadas (valores aceitos: de 0 a 6 (sendo "0" domingo e "6" sábado)) | [obrigatório]
**horariosDeCaptura** | **string[]** | são os horários do dia em que deseja realizar as escutas (valores aceitos: das 06:00 as 00:00) | [obrigatório] 

[[Voltar a lista da API]](../../../README.md#Documentação-para-os-Endpoints-da-API)    
[[Voltar para o README]](../../../README.md#Intima.ai---SDK-PHP)
