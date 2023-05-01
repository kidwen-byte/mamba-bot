<?php

namespace app\controllers;

use app\engine\Session;

class AdminController extends Controller
{
    public function actionIndex()
    {
              
        var_dump((new Session())->getAuthToken());

        
        $token = bin2hex('пекфпуека');
        var_dump($token);
        # or in php7
        $token = bin2hex('пекфпуека');
        var_dump($token);
        echo $this->render('admin');
    }
}
