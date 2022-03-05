<?php
/**
 * @author Javier Fernandez Rubio
 * 
 * Sumar los 3 primeros números pares.
 * 
 */
    $par = 2;
    $suma = 0;

    for ($i=1; $i<=3; $i++){
        echo $i." numero par es ".$par."<br/>";
        $suma = $suma + $par;
        $par = $par + 2;
    }
    echo "La suma total es de ".$suma;

?>