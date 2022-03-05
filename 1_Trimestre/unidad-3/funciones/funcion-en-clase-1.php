<?php
/**
 * Función que intercambia valores de dos variables que se le pasan
 *
 * @param [number] $x
 * @param [number] $y
 * @return void
 */
function intercambia(&$x,&$y){
    $c = $x;
    $x = $y;
    $y = $c;
}

$x = 0;
$y = 10;
echo $x.'</br>';
echo $y.'</br>';
intercambia($x,$y);
echo $x.'</br>';
echo $y.'</br>';