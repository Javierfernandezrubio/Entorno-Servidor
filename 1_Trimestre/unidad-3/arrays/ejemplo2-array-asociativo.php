<?php
/**
 * 
 * @author Javier Fernandez Rubio
 * 
 */

$families = array ("Griffin"=>array ("Peter", "Lois", "Megan"),
    "Quagmire"=>array("Glenn"),
    "Brown"=>array("Cleveland", "Loretta", "Junior")
    );

foreach ($families as $family => $miembros){
    echo "Familia ".$family.": ";
    foreach ($miembros as $mie){
        echo $mie." ";
    }
    echo "<br/>";
}

echo $families['Griffin'][2];