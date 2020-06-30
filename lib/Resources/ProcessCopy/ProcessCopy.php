<?php

namespace Intimaai\Resources\ProcessCopy;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\CopiaProcessual;
use Intimaai\Resources\Action;

class ProcessCopy extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'copias-processuais';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Obtem uma cópia processual pelo id
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
     * Cadastra uma nova cópia processual
     * @param CopiaProcessual $copiaProcessual
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovaCopia(CopiaProcessual $copiaProcessual)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'numero_processo' => $copiaProcessual->getNumeroProcesso(),
                'autenticacao_id' => $copiaProcessual->getAutenticacaoId()
            ]
        ];
        return $this->getAPI()->request($options, true);
    }
}