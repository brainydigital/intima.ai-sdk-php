<?php

namespace Intimaai\Resources\ProcessProtocol;

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
        return 'process-protocols-esaj';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Make a new protocol for ESAJ, first step
     * @param PrimeiraEtapaParaProtocoloProcessualEsaj $protocol
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function cadastrarPrimeiraEtapaParaNovoProtocoloEsaj(PrimeiraEtapaParaProtocoloProcessualEsaj $protocol)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $protocol->getProcessNumber(),
                'auth_id' => $protocol->getAuthId()
            ]
        ];

        return $this->getAPI()->request($options, true);
    }

    /**
     * Make a new protocol, second and last step
     * @param int $protocolId
     * @param SegundaEtapaParaProtocoloProcessualEsaj $protocol
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function cadastrarSegundaEtapaParaNovoProtocoloEsaj($protocolId, SegundaEtapaParaProtocoloProcessualEsaj $protocol)
    {
        $body = $this->serialize($protocol);

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/' . $protocolId,
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