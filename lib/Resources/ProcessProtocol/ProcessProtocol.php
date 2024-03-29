<?php

namespace Intimaai\Resources\ProcessProtocol;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\PrimeiraEtapaParaProtocoloProcessualEproc;
use Intimaai\Models\PrimeiraEtapaParaProtocoloProcessualEsaj;
use Intimaai\Models\PrimeiraEtapaParaProtocoloProcessualTjrj;
use Intimaai\Models\ProtocoloProcessual;
use Intimaai\Models\SegundaEtapaParaProtocoloProcessualEproc;
use Intimaai\Models\SegundaEtapaParaProtocoloProcessualEsaj;
use Intimaai\Models\SegundaEtapaParaProtocoloProcessualTjrj;
use Intimaai\Resources\Action;
use Intimaai\Utils\Utils;

class ProcessProtocol extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'protocolos-processuais';
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
        return $this->getAPI()->request($options);
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
        $body = $this->serializeForPJE($protocoloProcessual);

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'options' => [
                'is_multipart' => ($protocoloProcessual->getDocumentos() || $protocoloProcessual->getPeticao())
            ],
            'body' => $body
        ];

        return $this->getAPI()->request($options);
    }

    /**
     * @param ProtocoloProcessual $protocol
     * @return array
     * @throws Exception
     */
    private function serializeForPJE(ProtocoloProcessual $protocol)
    {
        $documents = $protocol->getDocumentos();
        $peticao = $protocol->getPeticao();

        if (!$documents && !$peticao)
        {
            return [
                'numero_processo' => $protocol->getNumeroProcesso(),
                'autenticacao_id' => $protocol->getAutenticacaoId(),
                'tipo_documento_mensagem_geral' => $protocol->getTipoDocumentoMensagemGeral(),
                'descricao' => $protocol->getDescricao(),
                'mensagem_geral' => $protocol->getMensagemGeral()
            ];
        }

        $body = [
            [
                'name' => 'numero_processo',
                'contents' => $protocol->getNumeroProcesso()
            ],
            [
                'name' => 'autenticacao_id',
                'contents' => $protocol->getAutenticacaoId()
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
                'contents' => Utils::validateFile($peticao->getArquivo())
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
        }

        return $body;
    }

    /**
     * Cadastra um novo protocolo para o TJRJ, está é a primeira etapa (de duas etapas) para cadastrar um novo protocolo no Intima.ai
     * @param PrimeiraEtapaParaProtocoloProcessualTjrj $primeiraEtapaParaProtocoloProcessualTjrj
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarPrimeiraEtapaParaNovoProtocoloTjrj(PrimeiraEtapaParaProtocoloProcessualTjrj $primeiraEtapaParaProtocoloProcessualTjrj)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/tjrj/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'numero_processo' => $primeiraEtapaParaProtocoloProcessualTjrj->getNumeroProcesso(),
                'autenticacao_id' => $primeiraEtapaParaProtocoloProcessualTjrj->getAutenticacaoId()
            ]
        ];

        return $this->getAPI()->request($options);
    }

    /**
     * Cadastra um novo protocolo para o TJRJ, está é a segunda e ultima etapa para cadastrar um novo protocolo no Intima.ai
     * @param int $protocoloProcessualId
     * @param SegundaEtapaParaProtocoloProcessualTjrj $segundaEtapaParaProtocoloProcessualTjrj
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarSegundaEtapaParaNovoProtocoloTjrj($protocoloProcessualId, SegundaEtapaParaProtocoloProcessualTjrj $segundaEtapaParaProtocoloProcessualTjrj)
    {
        $body = $this->serializeForTJRJ($segundaEtapaParaProtocoloProcessualTjrj);

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/tjrj/' . $this->getResourceEndpoint() . '/' . $protocoloProcessualId,
            'method' => API::POST,
            'options' => [
                'is_multipart' => true
            ],
            'body' => $body
        ];

        return $this->getAPI()->request($options);
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
            'path' => $this->action->getResourceEndpoint() . '/esaj/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'numero_processo' => $primeiraEtapaParaProtocoloProcessualEsaj->getNumeroProcesso(),
                'autenticacao_id' => $primeiraEtapaParaProtocoloProcessualEsaj->getAutenticacaoId()
            ]
        ];

        return $this->getAPI()->request($options);
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
        $body = $this->serializeForESAJ($segundaEtapaParaProtocoloProcessualEsaj);

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/esaj/' . $this->getResourceEndpoint() . '/' . $protocoloProcessualId,
            'method' => API::POST,
            'options' => [
                'is_multipart' => true
            ],
            'body' => $body
        ];

        return $this->getAPI()->request($options);
    }

    /**
     * Cadastra um novo protocolo para o EPROC, está é a primeira etapa (de duas etapas) para cadastrar um novo protocolo no Intima.ai
     * @param PrimeiraEtapaParaProtocoloProcessualEproc $primeiraEtapaParaProtocoloProcessualEproc
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarPrimeiraEtapaParaNovoProtocolEproc(PrimeiraEtapaParaProtocoloProcessualEproc $primeiraEtapaParaProtocoloProcessualEproc)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/eproc/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'numero_processo' => $primeiraEtapaParaProtocoloProcessualEproc->getNumeroProcesso(),
                'autenticacao_id' => $primeiraEtapaParaProtocoloProcessualEproc->getAutenticacaoId()
            ]
        ];

        return $this->getAPI()->request($options);
    }

    /**
     * Cadastra um novo protocolo para o EPROC, está é a segunda e ultima etapa para cadastrar um novo protocolo no Intima.ai
     * @param int $protocoloProcessualId
     * @param SegundaEtapaParaProtocoloProcessualEproc $segundaEtapaParaProtocoloProcessualEproc
     * @return mixed
     * @throws APIRequestException
     */
    public function cadastrarSegundaEtapaParaNovoProtocoloEproc($protocoloProcessualId, SegundaEtapaParaProtocoloProcessualEproc $segundaEtapaParaProtocoloProcessualEproc)
    {
        $body = $this->serializeForEPROC($segundaEtapaParaProtocoloProcessualEproc);

        $options = [
            'path' => $this->action->getResourceEndpoint() . '/eproc/' . $this->getResourceEndpoint() . '/' . $protocoloProcessualId,
            'method' => API::POST,
            'options' => [
                'is_multipart' => true
            ],
            'body' => $body
        ];

        return $this->getAPI()->request($options);
    }

    /**
     * @param SegundaEtapaParaProtocoloProcessualEproc $protocol
     * @return array
     * @throws Exception
     */
    private function serializeForEPROC(SegundaEtapaParaProtocoloProcessualEproc $protocol)
    {
        $documents = $protocol->getDocumentos();

        $body = [
            [
                'name' => 'tipo_documento_mensagem_geral',
                'contents' => $protocol->getTipoDocumentoMensagemGeral()
            ]
        ];

        $partes = $protocol->getPartesVinculadas();

        if (empty($partes))
        {
            $partes = [];
        }

        $index = 0;
        foreach ($partes as $parte)
        {
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

        if ($documents)
        {
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
        }

        return $body;
    }

    /**
     * @param SegundaEtapaParaProtocoloProcessualEsaj $protocol
     * @return array
     * @throws Exception
     */
    private function serializeForESAJ(SegundaEtapaParaProtocoloProcessualEsaj $protocol)
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
                'contents' => Utils::validateFile($peticao->getArquivo())
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
                    'contents' => Utils::validateFile($doc->getArquivo())
                ];
                $body[] = [
                    'name' => "documentos[$index][tipo_documento]",
                    'contents' => $doc->getTipoDocumento()
                ];
                $body[] = [
                    'name' => "documentos[$index][ordem]",
                    'contents' => $doc->getOrdem()
                ];
            }
        }

        return $body;
    }

    /**
     * @param SegundaEtapaParaProtocoloProcessualTjrj $protocol
     * @return array
     * @throws Exception
     */
    private function serializeForTJRJ(SegundaEtapaParaProtocoloProcessualTjrj $protocol)
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
                'contents' => Utils::validateFile($peticao->getArquivo())
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
        }

        return $body;
    }
}