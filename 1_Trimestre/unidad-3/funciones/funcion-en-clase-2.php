<?php

/**
 * Funcion fibonacci para probrar la recursividad en las funciones
 *
 * @param [type] $valor
 * @return void
 */
function fibonacci($n)
{
    $fibonacci = [0, 1];

    echo '1 ';
    for ($i = 2; $i <= $n; $i++) {
        echo $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2] . ' ';
    }
    //echo $fibonacci[$n]; => muestra el valor n de la serie fibonacci, ejemplo valor 10 es 55
}

fibonacci(10);
