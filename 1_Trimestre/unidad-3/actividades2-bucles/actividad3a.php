<?php
/**
 * @author Javier Fernandez Rubio
 * 
 * Tablas de multiplicar del 1 al 10. Aplicar estilos en filas/columnas
 * 
 */

echo '<table border="1" align="center">';
    for ($i = 1; $i <= 10; $i++){
        echo '<tr>';
        for ($j = 1; $j <= 10; $j++){
            //echo $i*$j."<br/>";
            if ($i == 1 || $j == 1){
                echo '<td class="sombreado">'.($i * $j).'</td>';
            } else {
                echo '<td>'.($i * $j).'</td>';
            }
        }
        echo '<tr>';
    }

echo '</table>';
