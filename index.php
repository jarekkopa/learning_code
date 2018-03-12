<?php

declare(strict_types = 1);

require('config.php');
require('classes/Bootstrap.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
    $controller->executeAction();
}