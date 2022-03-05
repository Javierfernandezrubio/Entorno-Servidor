<?php

/**
 * Prueba de la clase contador
 * 
 */

require_once 'Contador.php';

// Creamos contadores
$contador = new Contador(); // Contador inicializado a 0
$contador2 = new Contador(); // Contador2 inicializado a 0
$contador3 = new Contador(); // Contador3 inicializado a 0
$contador4 = new Contador(); // Contador4 inicializado a 0
$contador5 = new Contador(5); // Contador5 inicializado a 5

// Incrementamos los contadores
$contador->incrementar(); // Contador incrementado a 1
$contador->incrementar(); // Contador incrementado a 2
$contador->incrementar(); // Contador incrementado a 3

$contador2->incrementar(); // Contador2 incrementado a 1
$contador2->incrementar(); // Contador2 incrementado a 2


// Mostramos los contadores
echo 'Contador 1: ' . $contador->getContador() . '<br>';
echo 'Contador 2: ' . $contador2->getContador() . '<br>';
echo 'Contador 3: ' . $contador3->getContador() . '<br>';
echo 'Contador 4: ' . $contador4->getContador() . '<br>';
echo 'Contador 5: ' . $contador5->getContador() . '<br>';

// Mostramos las instancias
echo 'Instancias de la clase Contador: ' . Contador::getInstancias() . '<br>';