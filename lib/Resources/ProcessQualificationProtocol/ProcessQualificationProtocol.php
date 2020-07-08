<?php

namespace Intimaai\Resources\ProcessQualificationProtocol;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\PrimeiraEtapaParaProtocoloDeHabilitacao;
use Intimaai\Models\SegundaEtapaParaProtocoloDeHabilitacao;
use Intimaai\Resources\Action;
use Intimaai\Utils\Utils;

class ProcessQualificationProtocol extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'protocolos-de-habilitacao';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Obtem um protocolo de habilitação pelo id
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
     * Cadastra um novo protocolo de habilitação, está é a primeira etapa (de duas etapas) para cadastrar um novo protocolo de habilitação no Intima.ai
     * @param PrimeiraEtapaParaProtocoloDeHabilitacao $primeiraEtapaParaProtocoloDeHabilitacao
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarPrimeiraEtapaParaNovoProtocoloDeHabilitacao(PrimeiraEtapaParaProtocoloDeHabilitacao $primeiraEtapaParaProtocoloDeHabilitacao)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'numero_processo' => $primeiraEtapaParaProtocoloDeHabilitacao->getNumeroProcesso(),
                'autenticacao_id' => $primeiraEtapaParaProtocoloDeHabilitacao->getAutenticacaoId()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Cadastra um novo protocolo de habilitação, está é a segunda e ultima etapa para cadastrar um novo protocolo de habilitação no Intima.ai
     * @param int $protocoloDeHabilitacaoId
     * @param SegundaEtapaParaProtocoloDeHabilitacao $segundaEtapaParaProtocoloDeHabilitacao
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarSegundaEtapaParaNovoProtocoloDeHabilitacao($protocoloDeHabilitacaoId, SegundaEtapaParaProtocoloDeHabilitacao $segundaEtapaParaProtocoloDeHabilitacao)
    {
        $body = $this->serialize($segundaEtapaParaProtocoloDeHabilitacao);

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/' . $protocoloDeHabilitacaoId,
            'method' => API::POST,
            'options' => [
                'is_multipart' => ($segundaEtapaParaProtocoloDeHabilitacao->getDocumentos()) ? true : false
            ],
            'body' => $body
        ];

        return $this->getAPI()->request($options, true);
    }

    /**
     * @param SegundaEtapaParaProtocoloDeHabilitacao $qualificationProtocol
     * @return array
     * @throws Exception
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
                'contents' => Utils::validateFile($doc->getArquivo())
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
                'name' => "documentos[$index][ordem]",
                'contents' => $doc->getOrdem()
            ];
        }

        return $body;
    }
}