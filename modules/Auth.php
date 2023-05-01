<?php

namespace app\modules;

use app\engine\Connect;
use app\engine\Session;
use app\modules\Cookie;
use app\modules\Parser;

class Auth extends Connect
{

    public function signin($login, $password)
    {
        $data = [
            'user[login]'  => $login,
            'user[password]'  => $password
        ];

        $ch = curl_init($this->url['signin']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));

        (new Cookie())->setCookie(
            [
                'ch' => $ch,
                'login' => $login,
                'password' => $password,
                'method' => 'get',
            ]
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);

        /* var_dump(curl_getinfo($ch)); */

        $http_code = curl_getinfo($ch)['http_code'];

        if ($http_code == 200) {

            $id = explode("/", $response);
            $user_id = mb_substr($id[1], 0, -2);

            curl_setopt($ch, CURLOPT_URL, $this->url['home'] . '/' . $user_id);
            curl_setopt($ch, CURLOPT_POST, 0);

            $response = curl_exec($ch);

            (new Parser())->getToken($response);

            $name = (new Parser())->getName($response);

            $result = [
                'status' => 'success',
                'name' => $name,
                'message' => 'Авторизация прошла успешно'
            ];
            return $result;
        } else {
            $result = [
                'status' => 'error',
                'code' => 'Ошибка авторизации. Код ошибки ' . $http_code,
                'message' => 'Неверный логин или пароль'
            ];
            return $result;
        }
    }
}
