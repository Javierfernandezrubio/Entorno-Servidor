<?php 
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 */

$n1 = $_GET['x'];
$n2 = $_GET['y'];
$client = new SoapClient("http://www.dneonline.com/calculator.asmx?WSDL");

echo $n1.' + '.$n2.' = '.$client->Add([
    'intA' => $n1,
    'intB' => $n2
])->AddResult;
