<?php


namespace Intimaai;


use Intimaai\API\Resource;

class Auth extends Resource
{

    protected $relations = [
        'tribunal' => [
            'resource' => Tribunal::class,
            'id_attribute' => 'tribunal_id'
        ],
        'certificate' => [
            'resource' => Certificate::class,
            'id_attribute' => 'certificate_id'
        ]
    ];

    public function getResourceSlug()
    {
        return 'auths';
    }

}