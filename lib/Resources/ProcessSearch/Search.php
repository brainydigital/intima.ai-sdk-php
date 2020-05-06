<?php

namespace Intimaai\Resources\ProcessSearch;


class Search
{
    private $authId;
    private $processNumber;
    private $nomeParte;
    private $nomeRepresentante;
    private $token;

    /**
     * Search constructor.
     * @param int $authId
     * @param string|null $processNumber
     * @param string|null $nomeParte
     * @param string|null $nomeRepresentante
     * @param string|null $token
     */
    public function __construct($authId, $processNumber = null, $nomeParte = null, $nomeRepresentante = null, $token = null)
    {
        $this->authId = $authId;
        $this->processNumber = $processNumber;
        $this->nomeParte = $nomeParte;
        $this->nomeRepresentante = $nomeRepresentante;
        $this->token = $token;
    }

    /**
     * @return int
     */
    public function getAuthId()
    {
        return $this->authId;
    }

    /**
     * @param int $authId
     */
    public function setAuthId($authId)
    {
        $this->authId = $authId;
    }

    /**
     * @return string|null
     */
    public function getProcessNumber()
    {
        return $this->processNumber;
    }

    /**
     * @param string|null $processNumber
     */
    public function setProcessNumber($processNumber)
    {
        $this->processNumber = $processNumber;
    }

    /**
     * @return string|null
     */
    public function getNomeParte()
    {
        return $this->nomeParte;
    }

    /**
     * @param string|null $nomeParte
     */
    public function setNomeParte($nomeParte)
    {
        $this->nomeParte = $nomeParte;
    }

    /**
     * @return string|null
     */
    public function getNomeRepresentante()
    {
        return $this->nomeRepresentante;
    }

    /**
     * @param string|null $nomeRepresentante
     */
    public function setNomeRepresentante($nomeRepresentante)
    {
        $this->nomeRepresentante = $nomeRepresentante;
    }

    /**
     * @return string|null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
}