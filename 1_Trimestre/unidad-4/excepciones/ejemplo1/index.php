<?php

/**
 * Ejemplo de uso de excepciones
 * 
 * @author Javier Fernández Rubio
 */

// Excepciones
$fileName = "poema.txt";

try {
    if (!file_exists($fileName)) {
        throw new Exception("El archivo no existe");
    }
    $file = fopen($fileName, "r");
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
    fclose($file);
} catch (Exception $th) {
    echo $th->getMessage();
    die();
}
