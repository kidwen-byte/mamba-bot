<?php

namespace app\engine;

use app\engine\Session;
use app\modules\Parser;

class Connect
{

    protected $url = [
        'home' => 'https://tabor.ru',
        'signin' => 'https://tabor.ru/signin',
        'vote' => 'https://tabor.ru/services/sympathies/vote',
        'post_vote' => 'https://tabor.ru/services/sympathies/post_vote',
        'post_age' => 'https://tabor.ru/services/sympathies/post_age',
        'message' => 'https://tabor.ru/messages',
    ];

/*     public function connect()
    {
        $ch = curl_init($this->url['home']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_exec($ch);

        return $ch;
    } */

    public function closeConnect($ch)
    {
        return curl_close($ch);
    }
}
