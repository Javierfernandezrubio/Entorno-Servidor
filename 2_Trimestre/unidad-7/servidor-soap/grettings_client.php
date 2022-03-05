<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('soap.wsdl_cache_enabled', false);

$client = new SoapClient('grettings.wsdl');

echo $client->sayHello($_GET['name']);