<?php

require_once '../../vendor/autoload.php';



$router = new Router();
$router->add(array(
    'name' => 'home',
    'path' => '',
    'action' => 'index'
));