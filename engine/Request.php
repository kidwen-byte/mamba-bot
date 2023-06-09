<?php

namespace app\engine;

class Request
{

    protected $requestString;
    protected $controllerName;
    protected $actionName;

    protected $method;
    protected $params = [];

    public function __construct()
    {
        $this->parseRequest();
    }

    protected function parseRequest()
    {

        $this->requestString = $_SERVER['REQUEST_URI'];

        $this->method = $_SERVER['REQUEST_METHOD'];

        $url = explode('/', $this->requestString);
/* var_dump( $url); */
        $this->controllerName = $url[1];
        
        if (isset($url[2]) ) {
            $this->actionName = $url[2];
        }


        $this->params = $_REQUEST;

        $data = json_decode(file_get_contents('php://input'));
        if (!is_null($data)) {
            foreach ($data as $key => $value) {
                $this->params[$key] = $value;
            }
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}
