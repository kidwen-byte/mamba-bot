<?php

namespace app\modules;

use app\engine\Connect;
use app\engine\Session;

class Like extends Connect
{

    public function like($ch, $data)
    {
        $session = new Session();

        $token = $session->getToken();

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url['post_vote']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_COOKIEFILE, ROOT . '/engine/sessions/' . $session->getId() . 'cookie2.txt');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'Accept: */*;q=0.5, text/javascript, application/javascript, application/ecmascript, application/x-ecmascript',
            'Host: tabor.ru',
            'Origin: ' . $this->url['home'],
            'X-CSRF-Token: '  . $token,
            'X-Requested-With: XMLHttpRequest',
        ));
        curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
        /*   $this->destroyConnect($ch); */

        curl_exec($ch);

        var_dump(curl_getinfo($ch));

        if (curl_getinfo($ch)['http_code'] == 200) {
            /*     var_dump("OK"); */
        } else {
            /*   var_dump("ne ok"); */
        }
        /*  $this->closeConnect($ch); */
    }
}
