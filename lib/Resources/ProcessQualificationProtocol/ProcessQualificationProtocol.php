<?php

namespace Intimaai\Resources\ProcessQualificationProtocol;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\PrimeiraEtapaParaProtocoloDeHabilitacao;
use Intimaai\Models\SegundaEtapaParaProtocoloDeHabilitacao;
use Intimaai\Resources\Action;
use Intimaai\Resources\ProcessCopy\Copy;

class ProcessQualificationProtocol extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'process-qualification-protocols';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Get a qualification protocol by id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
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
     * Make a new qualification protocol, first step
     * @param PrimeiraEtapaParaProtocoloDeHabilitacao $qualificationProtocol
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao(PrimeiraEtapaParaProtocoloDeHabilitacao $qualificationProtocol)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $qualificationProtocol->getProcessNumber(),
                'auth_id' => $qualificationProtocol->getAuthId()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Make a new qualification protocol, second and last step
     * @param int $qualificationProtocolId
     * @param SegundaEtapaParaProtocoloDeHabilitacao $qualificationProtocol
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao($qualificationProtocolId, SegundaEtapaParaProtocoloDeHabilitacao $qualificationProtocol)
    {
        $body = $this->serialize($qualificationProtocol);

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/' . $qualificationProtocolId,
            'method' => API::POST,
            'options' => [
                'is_multipart' => ($qualificationProtocol->getDocumentos()) ? true : false
            ],
            'body' => $body
        ];

        return $this->getAPI()->request($options, true);
    }

    /**
     * @param SegundaEtapaParaProtocoloDeHabilitacao $qualificationProtocol
     * @return array
     */
    private function serialize($qualificationProtocol)
    {
        $documents = $qualificationProtocol->getDocumentos();

        if (!$documents)
        {
            return [
                'tipo_solicitacao' => $qualificationProtocol->getTipoSolicitacao(),
                'tipo_declaracao' => $qualificationProtocol->getTipoDeclaracao(),
                'polo' => $qualificationProtocol->getPolo(),
                'partes_vinculadas' => $qualificationProtocol->getPartesVinculadas(),
                'tipo_documento_mensagem_geral' => $qualificationProtocol->getTipoDocumentoMensagemGeral(),
                'descricao' => $qualificationProtocol->getDescricao(),
                'mensagem_geral' => $qualificationProtocol->getMensagemGeral(),
            ];
        }

        $body = [
            [
                'name' => 'tipo_solicitacao',
                'contents' => $qualificationProtocol->getTipoSolicitacao()
            ],
            [
                'name' => 'tipo_declaracao',
                'contents' => $qualificationProtocol->getTipoDeclaracao()
            ],
            [
                'name' => 'polo',
                'contents' => $qualificationProtocol->getPolo()
            ],
            [
                'name' => 'tipo_documento_mensagem_geral',
                'contents' => $qualificationProtocol->getTipoDocumentoMensagemGeral()
            ],
            [
                'name' => 'descricao',
                'contents' => $qualificationProtocol->getDescricao()
            ],
            [
                'name' => 'mensagem_geral',
                'contents' => $qualificationProtocol->getMensagemGeral()
            ],
        ];

        foreach ($qualificationProtocol->getPartesVinculadas() as $index => $parte)
        {
            $body[] = [
                'name' => "partes_vinculadas[$index]",
                'contents' => $parte
            ];
        }

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

        return $body;
    }
}