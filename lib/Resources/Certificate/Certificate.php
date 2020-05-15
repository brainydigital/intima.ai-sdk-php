<?php

namespace Intimaai\Resources\Certificate;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\Certificado;

class Certificate extends Resource
{
    public function getResourceEndpoint()
    {
        return 'certificates';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Get a certificate by id
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
     * Make a new certificate
     * @param Certificado $certificate
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function cadastrarNovoCertificado(Certificado $certificate)
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
                    'contents' => fopen($certificate->getPfx(), 'r')
                ],
                [
                    'name'     => 'password',
                    'contents' => $certificate->getPassword()
                ]
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Create a new certificate
     * @param int $certificateId
     * @param Certificado $certificate
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function atualizarCertificado($certificateId, Certificado $certificate)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $certificateId,
            'method' => API::POST,
            'options' => [
                'is_multipart' => true
            ],
            'body' => [
                [
                    'name'     => 'pfx',
                    'contents' => fopen($certificate->getPfx(), 'r')
                ],
                [
                    'name'     => 'password',
                    'contents' => $certificate->getPassword()
                ]
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Delete a certificate
     * @param int $certificateId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function excluirCertificado($certificateId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $certificateId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}