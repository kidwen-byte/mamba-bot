<?php

namespace app\engine;

class Session
{
    private $domain = "tabor-bot.ru";
    private $secret_key = "b95d4abec7c27ec87fb54da1621f9942948879e2";

    public function destroy()
    {
        session_destroy();
    }

    public function regenerate()
    {
        session_regenerate_id();
    }

    public  function getId()
    {
        return session_id();
    }

    public function setToken($value)
    {
        $_SESSION['csrf-token'] = $value;
    }

    public function getToken()
    {
        return $_SESSION['csrf-token'];
    }

/*     public function setKey($params)
    {
        $key = bin2hex($params);
        return $key;
    } */

    public function setAuthToken()
    {
        return $_SESSION['auth-token'] = hash_hmac('SHA256', $this->getId() . $this->domain, $this->secret_key);
    }

    /*     public function getAuthToken()
    {
        return $_SESSION['auth-token'];
    } */

    public function getAuthToken()
    {
        return $_SESSION['auth-token'];
    }

    public function authValid()
    {

        return hash_equals($this->getAuthToken(), hash_hmac('SHA256', $this->getId() . $this->domain, $this->secret_key));

   /*      if ($_SESSION['csrf-token'] == null) {
            header('Location: /');
            exit;
        } */
    }

    /*     public function tokenValid()
    {
        if ($_SESSION['csrf-token'] == null) {
            header('Location: /');
            exit;
        }
    } */
}
