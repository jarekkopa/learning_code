<?php

declare(strict_types = 1);

class Bootstrap{
    private $controler;
    private $action;
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
        if($this->request['controler'] == ""){
            $this->controler = 'home';
        } else {
            $this->controler = $this->request['controler'];
        }
        if($this->request['action'] == ""){
            $this->action = 'index';
        } else {
            $this->action = $this->request['controler'];
        }
    }
}