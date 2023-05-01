<?php

namespace app\modules;

use app\engine\Connect;
use app\engine\Session;

class Message extends Connect
{
    public function message($user_id)
    {
        $session = new Session();

        $token = $session->getToken();
        $messages = [
            "Привет. Я редко кому тут пишу и ставлю лайки, но ты мне понравилась и мне хотелось бы узнать тебя получше как человека :relaxed:",
            "Привет. Меня привлекла твоя внешность, но внешность это одно, а я хочу узнать тебя получше как личность :relaxed:",
            "Привет. Ты мне понравилась и пускай это будет возможно тупо и неинтересно, но опиши свой типаж мужчины. Так мы можем сэкономить время друг друга :sweat_smile:",
            "Привет. Я редко кому тут причуда и в принципе тут практический не сижу, но ты мне понравилась и мне хотелось пообщаться с тобой. Может быть, ты оставишь свои контакты - соц. сети, мессенджеры? :relaxed:"
        ];

        $ch = curl_init();
        $payload = json_encode(['type' => 'send_message', 'data' => ['message' => $messages[array_rand($messages)], 'offset_id' => 355073, 'user_id' => $user_id]]);

        var_dump($payload);
        /*         https://tabor.ru/id34346147 */
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url['message']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_COOKIEFILE, ROOT . '/engine/sessions/' . (new Session())->getId() . '/cookie2.txt');

        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json, text/javascript, */*; q=0.01',
            'Host: tabor.ru',
            'Origin: ' . $this->url['home'],
            'X-CSRF-Token: '  . $token,
            'X-Requested-With: XMLHttpRequest',
        ));

        curl_exec($ch);
        var_dump(curl_getinfo($ch, CURLINFO_HEADER_OUT));
        var_dump(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
        var_dump(curl_getinfo($ch));


        return $ch;
    }
}
