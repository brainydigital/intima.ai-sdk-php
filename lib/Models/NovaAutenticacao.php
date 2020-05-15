<?php

namespace Intimaai\Models;

class NovaAutenticacao
{
    private $tribunal_id;
    private $user_certificate_id;
    private $login;
    private $password;

    /**
     * NovaAutenticacao constructor.
     * @param int $tribunal_id
     * @param int|null $user_certificate_id
     * @param string|null $login
     * @param string|null $password
     */
    public function __construct($tribunal_id, $user_certificate_id = null, $login = null, $password = null)
    {
        $this->tribunal_id = $tribunal_id;
        $this->user_certificate_id = $user_certificate_id;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getTribunalId()
    {
        return $this->tribunal_id;
    }

    /**
     * @param int $tribunal_id
     */
    public function setTribunalId($tribunal_id)
    {
        $this->tribunal_id = $tribunal_id;
    }

    /**
     * @return int
     */
    public function getUserCertificateId()
    {
        return $this->user_certificate_id;
    }

    /**
     * @param int $user_certificate_id
     */
    public function setUserCertificateId($user_certificate_id)
    {
        $this->user_certificate_id = $user_certificate_id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}