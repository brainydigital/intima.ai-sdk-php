<?php

namespace Intimaai\Resources\ProcessProtocol;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\ProtocoloProcessual;
use Intimaai\Resources\Action;

class ProcessProtocolPje extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'pje/protocolos-processuais';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Obtem um protocolo processual pelo id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function consultarPorId($id)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Cadastra um novo protocolo processual para o PJE
     * @param ProtocoloProcessual $protocoloProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovoProtocolo(ProtocoloProcessual $protocoloProcessual)
    {
        $body = $this->serialize($protocoloProcessual);

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'options' => [
                'is_multipart' => ($protocoloProcessual->getDocumentos() || $protocoloProcessual->getPeticao())
            ],
            'body' => $body
        ];

        return $this->getAPI()->request($options, true);
    }

    /**
     * @param ProtocoloProcessual $protocol
     * @return array
     */
    private function serialize(ProtocoloProcessual $protocol)
    {
        $documents = $protocol->getDocumentos();
        $peticao = $protocol->getPeticao();

        if (!$documents && !$peticao)
        {
            return [
                'process_number' => $protocol->getProcessNumber(),
                'auth_id' => $protocol->getAuthId(),
                'tipo_documento_mensagem_geral' => $protocol->getTipoDocumentoMensagemGeral(),
                'descricao' => $protocol->getDescricao(),
                'mensagem_geral' => $protocol->getMensagemGeral()
            ];
        }

        $body = [
            [
                'name' => 'process_number',
                'contents' => $protocol->getProcessNumber()
            ],
            [
                'name' => 'auth_id',
                'contents' => $protocol->getAuthId()
            ],
            [
                'name' => 'tipo_documento_mensagem_geral',
                'contents' => $protocol->getTipoDocumentoMensagemGeral()
            ],
            [
                'name' => 'descricao',
                'contents' => $protocol->getDescricao()
            ],
            [
                'name' => 'mensagem_geral',
                'contents' => $protocol->getMensagemGeral()
            ]
        ];

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
            $body[] = [
                'name' => 'peticao[descricao_documento]',
                'contents' => $peticao->getDescricaoDocumento()
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
                    'name' => "documentos[$index][descricao_documento]",
                    'contents' => $doc->getDescricaoDocumento()
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