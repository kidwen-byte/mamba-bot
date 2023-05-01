<?php

namespace app\modules;

class Cookie
{
    public function setCookie($data) 
    {
        if (!file_exists(ROOT . '/engine/users/' . $data['login'])) {
            mkdir(ROOT . '/engine/users/' . $data['login'], 0777, true);
        }

        match ($data['method']) {
            'get' => curl_setopt($data['ch'], CURLOPT_COOKIEJAR, ROOT . '/engine/users/' . $data['login'] . '/cookie_get.txt'),
            'post' => curl_setopt($data['ch'], CURLOPT_COOKIEJAR, ROOT . '/engine/sessions/' . $data['login'] . '/cookie_post.txt'),
        };

        file_put_contents(ROOT . '/engine/users/' . $data['login'] . '/user.txt', $data['password']);
    }

    public function getCookie($ch)
    {

    }
}
