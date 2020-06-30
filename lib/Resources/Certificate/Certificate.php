<?php

namespace Intimaai\Resources\Certificate;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\Certificado;

class Certificate extends Resource
{
    public function getResourceEndpoint()
    {
        return 'certificados';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Obtem um certificado pelo id
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
     * Cadastra um novo certificado
     * @param Certificado $certificado
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovoCertificado(Certificado $certificado)
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::POST,
            'options' => [
                'is_multipart' => true
            ],
            'body' => [
                [
                    'name'     => 'pfx',
                    'contents' => fopen($certificado->getPfx(), 'r')
                ],
                [
                    'name'     => 'senha',
                    'contents' => $certificado->getSenha()
                ]
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Atualiza um certificado pelo id
     * @param int $certificadoId
     * @param Certificado $certificado
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function atualizarCertificado($certificadoId, Certificado $certificado)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $certificadoId,
            'method' => API::POST,
            'options' => [
                'is_multipart' => true
            ],
            'body' => [
                [
                    'name'     => 'pfx',
                    'contents' => fopen($certificado->getPfx(), 'r')
                ],
                [
                    'name'     => 'senha',
                    'contents' => $certificado->getSenha()
                ]
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Deleta um certificado pelo id
     * @param int $certificadoId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function excluirCertificado($certificadoId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $certificadoId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}