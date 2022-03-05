<?php

/**
 * Programa que lea un número entero N de 5 cifras y muestre sus cifras igual que en el ejemplo.
 * Ejemplo.
 * 
 * @author Javier Fernandez Rubio
 * date 6/10/2021
 */

$numero = 12345;

for ($i=-1; $i > (-strlen($numero)) ; $i--) { 
    echo (substr($numero, $i)).'<br>';
}
echo $numero;
