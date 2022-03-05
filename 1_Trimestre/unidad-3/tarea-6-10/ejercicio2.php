<?php

/**
 * Escribe un programa que genere e imprima un número aleatorio de 4 cifras, mostrando a
 * continuación cada una de sus cifras en un color diferente.
 * 
 * @author Javier Fernandez Rubio
 * date 6/10/2021
 */


$numero = rand(0,10000);

echo $numero;

for ($i=0; $i < strlen($numero) ; $i++) { 
    echo '<p style="color:rgb('.(rand(-250, 250)).','.(rand(-250, 250)).','.(rand(-250, 250)).')">'.$numero[$i].'</td>';
    echo  '<br>';
    
}