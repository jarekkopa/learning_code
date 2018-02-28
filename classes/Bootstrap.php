<?php

declare(strict_types = 1);

class Bootstrap{
    private $controller;
    private $action;
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
        if($this->request['controller'] == ""){
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }
        if($this->request['action'] == ""){
            $this->action = 'index';
        } else {
            $this->action = $this->request['controller'];
        }

    }

    public function createController()
    {
        //Check class
        if(class_exists($this->controller)){
            $parents = class_parents($this->controller);
            //Check extend
            if(in_array("Controller", $parents)){
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                } else {
                    //Method dosnt exist
                    echo '<h1>Metoda nie istnieje</h1>';
                }
            } else {
                //Base controller dosnt exist
                echo '<h1>Kontroler nie istnieje</h1>';
            }
        } else {
            //Controller Class dosnt exist
            echo '<h1>Kontroler klasy nie istnieje</h1>';
        }
    }
}