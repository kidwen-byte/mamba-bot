<?php

namespace app\modules;

use app\engine\Connect;
use app\engine\Session;

class Vote extends Connect
{

    public function vote()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url['vote']);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_COOKIEFILE, ROOT . '/engine/sessions/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEJAR, ROOT . '/engine//sessions/' . (new Session())->getId() . '/cookie2.txt');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);

        $dom = new \DomDocument();
        $dom->loadHTML($response);
        $tags = $dom->getElementsByTagName("a");
        for ($i = 0; $i < $tags->length; $i++) {
            $grab = $tags->item($i);
            if ($grab->getAttribute('class') === 'user__name') {
                $id = $grab->getAttribute('href');
            }
        }

        $user_id = mb_substr($id, 3);
        var_dump($user_id);
        $data = [
            'ad_user'  => false,
            'user_id'  => $user_id,
            'vote' => 'like'
        ];

        /*   var_dump(curl_getinfo($ch)); */
        $result = [
            'ch' => $ch,
            'data' => $data
        ];

        return  $result;
    }
}
