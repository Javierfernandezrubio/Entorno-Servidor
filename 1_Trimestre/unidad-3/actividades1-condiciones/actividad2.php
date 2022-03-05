<?php
/**
 * @author Javier Fernandez Rubio
 * 
 * Carga en variables mes y año e indica el número de días del mes. Utiliza la estructura de control switch
 * 
 */
    $mes = 2;
    $anyo = 2004;
    $bisiesto;

    switch ($mes){
        case 4:
        case 6:
        case 9:
        case 11:
            echo "El mes ".$mes." tiene 30 días<br/>";
            break;
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            echo "El mes ".$mes." del año ".$anyo." tiene 31 días<br/>";
            break;
        case 2:
            if ($anyo % 400 == 0){
                $bisiesto = true;
            }else if ($anyo % 100 == 0){
                $bisiesto = false;
            }else if ($anyo % 4 == 0){
                $bisiesto = true;
            }else{
                $bisiesto = false;
            }
            if ($bisiesto){
                echo "El mes ".$mes." del año ".$anyo." tiene 29 días<br/>";
            } else {
                echo "El mes ".$mes." del año ".$anyo." tiene 28 días<br/>";
            }
            break;
    }
?>