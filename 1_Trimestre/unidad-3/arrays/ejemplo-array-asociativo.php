<?php

/**
 * 
 * @author Javier Fernandez Rubio
 * 
 */

$covid = array(
    "Cordoba" => 50,
    "Sevilla" => 100,
    "Malaga" => 150,
    "Jaen" => 75,
    "Almeria" => 60,
    "Cadiz" => 55,
    "Granada" => 95,
    "Huelva" => 85
);

foreach ($covid as $valor){
    echo $valor;
    echo "<br/>";
}


foreach ($covid as $city => $valor){
    echo $city.": ".$valor;
    echo "<br/>";
}
