<?php

namespace app\controllers;

use app\modules\Auth;
use app\engine\Request;
use app\engine\Session;

class SigninController extends Controller
{
    public function actionIndex()
    {
        $login = (new Request())->getParams()['login'];
        $password = (new Request())->getParams()['password'];

        $auth = new Auth();

        $result = $auth->signin($login, $password);

        if ($result['status'] == 'success') {
            header("refresh:5;url=admin");
            $token = [
                'login' => bin2hex($login),
                'token' => bin2hex('tabor-bot.ru'),
            ];
          
            (new Session())->setAuthToken($token);
            echo $this->render('signin', [
                'status' => $result
            ]);
        } else {
            header("refresh:5;url=index");
            echo $this->render('signin', [
                'status' => $result
            ]);
        }
    }
}
