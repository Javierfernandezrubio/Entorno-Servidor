<?php
/**
 * 1. Escribe un programa que genere e imprima 20 números aleatorios (0-100), mostrando también el
 * mayor, el menor y la media.
 * 
 * @author Javier Fernandez Rubio
 * date 6/10/2021
 */

 // Variables
 $mayor = -1;
 $menor = 101;
 $media;

 for ($i = 1; $i <= 20; $i++){
    $number = rand(0,100);
    echo "Número ramdon ".$i.": ".$number."</br>";
    if ($number > $mayor){
        $mayor = $number;
    }
    if ($number < $menor){
        $menor = $number;
    }

    $suma += $number; 
 }

 $media = $suma/20;
 
 echo "Número mayor: ".$mayor."</br>";
 echo "Número menor: ".$menor."</br>";
 echo "Media de todos los números: ".$media."</br>";