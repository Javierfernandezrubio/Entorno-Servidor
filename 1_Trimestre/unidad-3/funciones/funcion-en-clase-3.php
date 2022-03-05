<?php
/**
 * Ejemplo de uso ded una funcion anonima
 * 
 * @author Javier Fernandez rubio 
 */

$arrayNumeros = array(2,4,6,8,7,5,10);
print_r($arrayNumeros);

echo '<br/>';
$arrayCuadrados = array_map(function($numero){
    return $numero**2;
}, $arrayNumeros);

print_r($arrayCuadrados);