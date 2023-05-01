<?php

namespace app\controllers;

use app\engine\Render;

class Controller
{

    private $action;
    private $defaultAction = 'index';

    protected $render;

    public function __construct()
    {
        $this->render = new Render();
    }

    public function runAction($action)
    {

        $this->action = $action ?? $this->defaultAction;

        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        }
    }

    public function render($template, $params = [])
    {
        return $this->renderTemplate($template, $params);
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}
