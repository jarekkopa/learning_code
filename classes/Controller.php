<?php
declare(strict_types = 1);

abstract class Controller
{
    protected $request;
    protected $action;

    public function __construct($request, $action)
    {
        $this->request = $request;
        $this->action = $action;
    }

    public function executeAction()
    {
        return $this->{$this->action}();
    }

    protected function returnView($viewModel, $fullView)
    {
        $view = 'views/'. get_class($this).  '/' . $this->action. '.php';
        if($fullView){
            require('views/main.php');
        } else {
            require($view);
        }
    }
}