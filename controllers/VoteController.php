<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\modules\Vote;
use app\modules\Like;
use app\modules\Age;
use app\modules\Message;
use app\modules\Signin;

class VoteController extends Controller
{
    public function actionIndex()
    {
      /*   (new Session())->tokenValid(); */

        echo $this->render('vote');
    }

    public function actionAge()
    {

        $age_min = (new Request())->getParams()['age_min'];
        $age_max = (new Request())->getParams()['age_max'];

        (new Vote())->vote();

        $token = (new Session())->getToken();

        $data = [
            'authenticity_token' => $token,
            'page_reload' => 'true',
            'ages' =>  $age_min . ';' . $age_max

        ];

        $result = (new Age())->postAge($data);
        var_dump($result);
        if (curl_getinfo($result)['http_code'] == 200) {
            echo json_encode('Настройки сохранены');
        } else {
            echo 'Не удалось сохранить возрастной диапазон';
        }
    }

    public function actionLike()
    {
        $count = (new Request())->getParams()['count'];
        $count ?: $count = 1;

        $vote = new Vote();

        $like = new Like();

        for ($i = 1; $i <= $count; $i++) {

            $result = $vote->vote();
      /*       (new Message())->message($result['data']['user_id']); */
            $like->like($result['ch'], $result['data']);
        }
    }
}
