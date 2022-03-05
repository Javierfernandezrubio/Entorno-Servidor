<?php
/**
 * @author Javier Fernández Rubio
 * Escribir un script que utilizando variables permita obtener el siguiente resultado:
 * Valor es string.
 * Valor es double.
 * Valor es boolean.
 * Valor es integer.
 * Valor is NULL.
 * 
 */
    // Variables
    $var = "";
    $var1 = 2.55858;
    $var2 = true;
    $var3 = 5;
    $var4 = null;

    // Resultado
    echo "Valor es ".gettype($var).'</br>';
    echo "Valor es ".gettype($var1).'</br>';
    echo "Valor es ".gettype($var2).'</br>';
    echo "Valor es ".gettype($var3).'</br>';
    echo "Valor es ".gettype($var4).'</br>';


?>