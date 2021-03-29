<?php


namespace App\Controllers;


use App\Controllers\Home;
use App\Resources\TemplateEngine;
class App
{

    public Request $request;
    public string|null $className;
    public string|null $methodName;
    public array|null $passedParams;
    public function __construct()
    {

        $this->request = new Request();
        $this->init();
    }

    public function init(){

        try{
            $classPath = "\App\Controllers\\". $this->request->getController();
            $action = $this->request->getAction();
            $reflectionClass = new \ReflectionClass($classPath);
            $class = $reflectionClass->newInstance();
            $class->request = $this->request;
            $class->className = $this->request->getController();
            $class->methodName = $this->request->getAction();
            $class->passedParams = $this->request->getParams();
            if(sizeof($this->request->getParams()) > 0){
                $class->{$action}($this->request->getParams());
            }else{
                $class->{$action}();
            }



        }catch(\HttpException $ex){
            echo $ex->getMessage();
        }

    }

    public function render($var = false){


        try{
            $templateEngine = new TemplateEngine();

            $template = $templateEngine->load(ucfirst($this->className) ."/". strtolower($this->methodName .".html"));
            echo $template->render($var);
        }catch(\Twig\Error\LoaderError $ex){
            echo $ex->getMessage();

        }

    }

}