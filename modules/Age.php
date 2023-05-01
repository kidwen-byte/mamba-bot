<?php

namespace app\modules;

use app\engine\Connect;
use app\engine\Session;

class Age extends Connect
{
    public function postAge($data)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url['post_age']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_COOKIEFILE, ROOT . '/engine/sessions/' . (new Session())->getId() . '/cookie2.txt');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'Accept: */*;q=0.5, text/javascript, application/javascript, application/ecmascript, application/x-ecmascript',
            'Host: tabor.ru',
            'Origin: ' . $this->url['home'],
            'X-CSRF-Token: '  . $data['authenticity_token'],
            'X-Requested-With: XMLHttpRequest',
        ));

        curl_exec($ch);
        /*         var_dump(curl_getinfo($ch, CURLINFO_HEADER_OUT));
        var_dump(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
        var_dump(curl_getinfo($ch)); */


        return $ch;
    }
}
