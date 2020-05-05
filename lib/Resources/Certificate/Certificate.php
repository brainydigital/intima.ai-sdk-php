<?php

namespace Intimaai\Resources\Certificate;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;

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
    public function getById($id)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Create a new certificate
     * @param UserCertificate $certificate
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewCertificate(UserCertificate $certificate)
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
     * @param UserCertificate $certificate
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function updateCertificate($certificateId, UserCertificate $certificate)
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
    public function deleteCertificate($certificateId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $certificateId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}