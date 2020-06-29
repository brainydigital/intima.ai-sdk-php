<?php

namespace Intimaai\Resources\ProcessProtocol;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\PrimeiraEtapaParaProtocoloProcessualEsaj;
use Intimaai\Models\SegundaEtapaParaProtocoloProcessualEsaj;
use Intimaai\Resources\Action;

class ProcessProtocolEsaj extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'esaj/protocolos-processuais';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Cadastra um novo protocolo para o ESAJ, está é a primeira etapa (de duas etapas) para cadastrar um novo protocolo no Intima.ai
     * @param PrimeiraEtapaParaProtocoloProcessualEsaj $primeiraEtapaParaProtocoloProcessualEsaj
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarPrimeiraEtapaParaNovoProtocoloEsaj(PrimeiraEtapaParaProtocoloProcessualEsaj $primeiraEtapaParaProtocoloProcessualEsaj)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $primeiraEtapaParaProtocoloProcessualEsaj->getProcessNumber(),
                'auth_id' => $primeiraEtapaParaProtocoloProcessualEsaj->getAuthId()
            ]
        ];

        return $this->getAPI()->request($options, true);
    }

    /**
     * Cadastra um novo protocolo para o ESAJ, está é a segunda e ultima etapa para cadastrar um novo protocolo no Intima.ai
     * @param int $protocoloProcessualId
     * @param SegundaEtapaParaProtocoloProcessualEsaj $segundaEtapaParaProtocoloProcessualEsaj
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarSegundaEtapaParaNovoProtocoloEsaj($protocoloProcessualId, SegundaEtapaParaProtocoloProcessualEsaj $segundaEtapaParaProtocoloProcessualEsaj)
    {
        $body = $this->serialize($segundaEtapaParaProtocoloProcessualEsaj);

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/' . $protocoloProcessualId,
            'method' => API::POST,
            'options' => [
                'is_multipart' => true
            ],
            'body' => $body
        ];

        return $this->getAPI()->request($options, true);
    }

    /**
     * @param SegundaEtapaParaProtocoloProcessualEsaj $protocol
     * @return array
     */
    private function serialize(SegundaEtapaParaProtocoloProcessualEsaj $protocol)
    {
        $documents = $protocol->getDocumentos();
        $peticao = $protocol->getPeticao();

        $body = [
            [
                'name' => 'classe_id',
                'contents' => $protocol->getClasseId()
            ],
            [
                'name' => 'categoria_id',
                'contents' => $protocol->getCategoriaId()
            ]
        ];

        $partes = $protocol->getPartesVinculadas();

        if (empty($partes)) {
            $partes = [];
        }

        $index = 0;
        foreach ($partes as $parte) {
            $body[] = [
                'name' => "partes_vinculadas[$index][nome]",
                'contents' => $parte->getNome()
            ];
            if (!empty($parte->getParticipacao())) {
                $body[] = [
                    'name' => "partes_vinculadas[$index][participacao]",
                    'contents' => $parte->getParticipacao()
                ];
            }
            $index++;
        }

        if ($peticao)
        {
            $body[] = [
                'name' => 'peticao[arquivo]',
                'contents' => fopen($peticao->getArquivo(), 'r')
            ];
            $body[] = [
                'name' => 'peticao[tipo_documento]',
                'contents' => $peticao->getTipoDocumento()
            ];
        }

        if ($documents)
        {
            foreach ($documents as $index => $doc)
            {
                $body[] = [
                    'name' => "documentos[$index][arquivo]",
                    'contents' => fopen($doc->getArquivo(), 'r')
                ];
                $body[] = [
                    'name' => "documentos[$index][tipo_documento]",
                    'contents' => $doc->getTipoDocumento()
                ];
                $body[] = [
                    'name' => "documentos[$index][order]",
                    'contents' => $doc->getOrder()
                ];
            }
        }

        return $body;
    }
}