<?php
/**
 * @author Javier Fernández Rubio
 * 
 * Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor hexadecimal que le
 * corresponde. Cada celda será un enlace a una página que mostrará un fondo de pantalla con el color
 * seleccionado. ¿Puedes hacerlo con los conocimientos que tienes?
 * 
 */

 // Variables
$red; // Rojo
$green; // Verde
$blue; // Azul
$colorHex; // Color en Hexadecimal

echo '<table border="1" align="center">';
$i = 0;
for ($red = 0; $red <= 256; $red += 16){
    if ($red == 256) $red = 255;
    for ($green =0; $green <= 256; $green +=16){
        if ($green == 256) $green = 255;
        for ($blue = 0; $blue <= 256; $blue +=16){
            if ($blue == 256) $blue = 255;
            $colorHex = sprintf("%02s", dechex($red)).sprintf("%02s", dechex($green)).sprintf("%02s", dechex($blue)).'>#'.sprintf("%02s", dechex($red)).sprintf("%02s", dechex($green)).sprintf("%02s", dechex($blue));
            echo '<td width="10px" height="10px" bgcolor=#'.sprintf("%02s", dechex($red)).sprintf("%02s", dechex($green)).sprintf("%02s", dechex($blue)).'>#'.sprintf("%02s", dechex($red)).sprintf("%02s", dechex($green)).sprintf("%02s", dechex($blue)).'><a href=actividad4a.php?=#'.$colorHex.'\"></a></td>';
        }
       echo '</tr>';
    }
}
echo '</tr>';