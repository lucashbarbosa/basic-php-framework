<?php


namespace App\Controllers;


class Request
{
    private array $uri;
    private string|null $path;
    private string|null $controller;
    private string|null $action;
    private array|null $params;




    public function __construct()
    {

        $this->uri = parse_url($_SERVER['REQUEST_URI']);
        $this->controller = $this->defineController($this->uri);
        $this->action = $this->defineAction($this->uri);
        $this->params = $this->defineParams($this->uri);
    }


    public function defineController($uri) :string
    {

        $controller = explode("/", $uri['path']);

        if(strlen($controller[1]) == 0  ){
            if(isset($controller[3])){
                return strlen($controller[3] > 0 )? $controller[3]  : $this->getDefaultController();
            }
        }elseif(strlen($controller[1] > 0)){
            return $controller[1];
        }elseif(strlen($controller[2] > 0) ){
            return $controller[2];
        }

        return $this->getDefaultController();
    }

    public function defineParams($uri) :array
    {

        if(isset($uri['query'])){
            parse_str($uri['query'], $params);
            return $params;
        }

        return [];
    }

    public function defineAction($uri):string
    {
        $action = explode("/", $uri['path']);

        $a = isset($action[2]) ? $action[2] : "";

        return  (strlen($action[1]) == 0 || strlen($a) == 0) ? "index" : strtolower($a);
    }

    public function getDefaultController() :string
    {
        return "home";
    }

    public function getController() :string
    {
        return $this->controller;
    }
    public function getAction():string
    {
        return $this->action;
    }
    public function getParams():array
    {
        return $this->params;
    }

}