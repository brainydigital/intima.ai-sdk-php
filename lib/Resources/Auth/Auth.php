<?php

namespace Intimaai\Resources\Auth;

use Exception;
use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Resource;
use Intimaai\Models\AtivarIntimacoesParaAutenticacao;
use Intimaai\Models\AtualizarAutenticacao;
use Intimaai\Models\NovaAutenticacao;

class Auth extends Resource
{
    public function getResourceEndpoint()
    {
        return 'autenticacoes';
    }

    public function __construct(API $api)
    {
        parent::__construct($api);
    }

    /**
     * Obtem uma autenticação por id
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
     * Cadastra uma nova autenticação
     * @param NovaAutenticacao $autenticacao
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function cadastrarNovaAutenticacao(NovaAutenticacao $autenticacao)
    {
        $options = [
            'path' => $this->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'tribunal_id' => $autenticacao->getTribunalId(),
                'certificado_id' => $autenticacao->getCertificadoId(),
                'login' => $autenticacao->getLogin(),
                'senha' => $autenticacao->getSenha(),
                'oab_numero' => $autenticacao->getOabNumero(),
                'oab_letra' => $autenticacao->getOabLetra(),
                'oab_uf' => $autenticacao->getOabUf()
            ]
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Atualiza uma autenticação
     * @param int $autenticacaoId
     * @param AtualizarAutenticacao $atualizarAutenticacao
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function atualizarAutenticacao($autenticacaoId, AtualizarAutenticacao $atualizarAutenticacao)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $autenticacaoId . '/atualizar',
            'method' => API::PUT,
            'body' => [
                'oab_numero' => $atualizarAutenticacao->getOabNumero(),
                'oab_letra' => $atualizarAutenticacao->getOabLetra(),
                'oab_uf' => $atualizarAutenticacao->getOabUf()
            ]
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Ativa a captura de intimações para uma autenticação
     * @param int $autenticacaoId
     * @param AtivarIntimacoesParaAutenticacao $ativarAutenticacao
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function ativarCapturaDeIntimacoesParaAutenticacao($autenticacaoId, AtivarIntimacoesParaAutenticacao $ativarAutenticacao)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $autenticacaoId . '/intimacoes/ativar',
            'method' => API::PUT,
            'body' => [
                'abas' => $ativarAutenticacao->getAbas(),
                'dias_da_semana' => $ativarAutenticacao->getDiasDaSemana(),
                'horas_do_dia' => $ativarAutenticacao->getHorasDoDia()
            ]
        ];
        return $this->getAPI()->request($options);
    }

    /**
     * Desativa a captura de intimações para uma autenticação
     * @param int $autenticacaoId
     * @return mixed
     * @throws APIRequestException
     * @throws Exception
     */
    public function desativarCapturaDeIntimacoesParaAutenticacao($autenticacaoId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $autenticacaoId . '/intimacoes/desativar',
            'method' => API::PUT
        ];
        return $this->getAPI()->request($options);
    }
}